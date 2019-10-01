<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
use App\Antrianpoli;
use App\Countertpp;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Events\CallAntrian;
use App\Events\AmbilAntrian;
use App\Events\Addantrianpoli;
use App\Events\Changedashboardpoli;
use App\Events\CallDisplaypoli;
use App\Helpers\Locksystem;
use App\Lock;
use App\User;
use Yajra\Datatables\Datatables;

//Enables us to output flash messaging
use Session;

class AntrianpoliController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index()
    {
        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $getunprocess = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('status', 1)->where('countertpp_id', Auth::user()->countertpp->user_id)->count();
        $gettotalantrian = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id', Auth::user()->countertpp->user_id)->count();
        $getprocessed = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('status', 2)->where('countertpp_id', Auth::user()->countertpp->user_id)->count();

        $countertpps = Countertpp::get()->pluck('name', 'id')->toArray();

        $getlastcalls = Antrianpoli::where('tgl_antrian', $tgl_sekarang)
            ->where('status', 2)
            ->where('countertpp_id', Auth::user()->countertpp->user_id)
            ->orderBy('nomor_antrian','DESC')
            ->get()
            ->take(1);

        if (!$getlastcalls->isEmpty()) {
            foreach($getlastcalls as $getlastcall ){
                $nomorantrian = $getlastcall->nomor_antrian;
                $jenis =  $getlastcall->jenisantrian_id;
            }

            if($jenis == 1 ){
                $jenisAntrian = "B";

            }else if($jenis == 2){
                $jenisAntrian = "A";
            }

            if( $nomorantrian >= 1 &&  $nomorantrian <  10 ){
                $concatNoAntrian = $jenisAntrian."-00" .$nomorantrian;
            }else if($nomorantrian >= 10 && $nomorantrian <  99 ){
                $concatNoAntrian = $jenisAntrian."-0".$nomorantrian;
            }else if($nomorantrian >= 100 && $nomorantrian <  999 ){
                $concatNoAntrian = $jenisAntrian."-".$nomorantrian;
            }
        }else{
            $concatNoAntrian = "A-000";
        }


        return view('antrianpoli.index',compact('getunprocess','concatNoAntrian','getprocessed','gettotalantrian','countertpps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {





    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisantrian = $request->input('jenisantrian_id');
        $nomorantrian = $request->input('nomor_antrian');
        $countertpp = $request->input('countertpp_id');



        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $date = Carbon::parse(now());
        $tahun = $date->year;
        $bulan = $date->month;
        $hari = $date->day;

        $antrianpoli = new Antrianpoli();
        $antrianpoli->jenisantrian_id = $jenisantrian;
        $antrianpoli->nomor_antrian = $nomorantrian;
        $antrianpoli->tgl_antrian = now();
        $antrianpoli->periode = $bulan;
        $antrianpoli->fiscal_year =  $tahun;
        $antrianpoli->countertpp_id =  $countertpp;
        $antrianpoli->status =  1;
        $antrianpoli->user_id =  Auth::user()->id;


        $antrianpoli->save();

        if(!$antrianpoli->save()){
            App::abort(500, 'Error');
        }else{
            $total = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id', $countertpp)->count();
            $sisa = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id', $countertpp)->where('status', 1)->count();

            event(new Addantrianpoli(Auth::user(),$nomorantrian,$jenisantrian, $sisa, $total , $countertpp));

            return response()->json([
                'message' => ' Antrian nomor '.$nomorantrian.' telah ditambahkan kepoli.',
                'data'=>[
                    $nomorantrian,
                    $sisa
                ]
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function nextcall(Request $request)
    {
        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $countertpp = Auth::user()->countertpp->id;

        $cek_locked = Locksystem::get_status();

        if($cek_locked === false){
            $getnextcall = Antrianpoli::where('tgl_antrian', $tgl_sekarang)
            ->where('countertpp_id',  $countertpp)
            ->where('status', 1)
            ->orderBy('nomor_antrian','ASC')
            ->get()
            ->take(1);



        if (!$getnextcall->isEmpty()) {
            $message = 'Data Antrian ditemukan';
            $status = true;
            $idantrian = $getnextcall[0]->id;

            DB::beginTransaction();

            try {
                    $updatestatus = Antrianpoli::findorFail($idantrian);
                    $updatestatus->status = 2;
                    $updatestatus->save();

                    $setlock = new Lock();
                    $setlock->user_id =  Auth::user()->id;
                    $setlock->save();

                    $total = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id',  $countertpp)->count();
                    $getunprocess = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id',  $countertpp)->where('status', 1)->count();
                    $getprocessed = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id',  $countertpp)->where('status', 2)->count();

                    $nomorantrian = $getnextcall[0]->nomor_antrian;
                    $jenisantrian = $getnextcall[0]->jenisantrian_id;
                    $userid = Auth::user()->id;

                    event(new CallDisplaypoli(Auth::user(), $getnextcall[0]->nomor_antrian,$getnextcall[0]->jenisantrian_id, $getunprocess, $getprocessed ));

                    event(new Changedashboardpoli(Auth::user(),$nomorantrian,$jenisantrian, $getunprocess, $total , $countertpp, $userid));

                    DB::commit();
                    // all good
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json([
                        'message' => $e,
                        'status' => false,
                    ]);
                }

         }else{
            $message = 'Tidak ditemukan data antrian';
            $status = false;
         }
            return response()->json([
                'message' => $message,
                'status' => $status,
                'data' =>  $getnextcall

            ]);
        }else{
            return response()->json([
                'message' => "Mohon Maaf, unit lain sedang melakukan panggilan. Silahkan dicoba kembali dalam beberapa saat.",
                'status' => false,
                'data' =>  []

            ]);
        }
    }

    public function recall(Request $request)
    {
        $jenisantrian = $request->input('jenisantrian_id');
        $kodepoli = Auth::user()->countertpp->id;

        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $cek_locked = Locksystem::get_status();
        if($cek_locked === false){
            $getnextcall = Antrianpoli::where('tgl_antrian', $tgl_sekarang)
            ->where('countertpp_id',  $kodepoli)
            ->where('status', 2)
            ->orderBy('nomor_antrian','DESC')
            ->get()
            ->take(1);

            if (!$getnextcall->isEmpty()) {
                $message = 'Data Antrian ditemukan';
                $status = true;
            }else{
                $message = 'Tidak ditemukan data antrian';
                $status = false;
            }

            $setlock = new Lock();
            $setlock->user_id =  Auth::user()->id;
            $setlock->save();

            $getunprocess = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id',  $kodepoli)->where('status', 1)->count();
            $getprocessed = Antrianpoli::where('tgl_antrian', $tgl_sekarang)->where('countertpp_id',  $kodepoli)->where('status', 2)->count();

            event(new CallDisplaypoli(Auth::user(), $getnextcall[0]->nomor_antrian,$getnextcall[0]->jenisantrian_id, $getunprocess, $getprocessed ));

            return response()->json([
                'message' => $message,
                'status' => $status,
                'data' =>  $getnextcall

            ]);
        }else{
            return response()->json([
                'message' => "Mohon Maaf, unit lain sedang melakukan panggilan. Silahkan dicoba kembali dalam beberapa saat.",
                'status' => false,
                'data' =>  []

            ]);
        }
    }
}
