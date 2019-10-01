<?php

namespace App\Http\Controllers;
use Terbilang;
use PanggilanHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
use App\Antrian;
use App\Countertpp;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Events\CallAntrian;
use App\Events\AmbilAntrian;
use App\Helpers\Locksystem;

use App\User;
use App\Lock;
use Yajra\Datatables\Datatables;

//Enables us to output flash messaging
use Session;

class AntrianController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index()
    {
        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();
        $getunprocess = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 1)->count();
        $gettotalantrian = Antrian::where('tgl_antrian', $tgl_sekarang)->count();
        $getprocessed = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 2)->count();

        $countertpps = Countertpp::get()->pluck('name', 'id')->toArray();
        $getlastcalls = Antrian::where('tgl_antrian', $tgl_sekarang)
            ->where('status', 2)
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


        return view('antrian.index',compact('getunprocess','concatNoAntrian','getprocessed','gettotalantrian','countertpps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antrian.create');
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

        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $getlastantrian = Antrian::where('tgl_antrian', $tgl_sekarang)->count();

        $nextnumber = $getlastantrian + 1;

        $date = Carbon::parse(now());
        $tahun = $date->year;
        $bulan = $date->month;
        $hari = $date->day;

        $antrian = new Antrian();
        $antrian->jenisantrian_id = $jenisantrian;
        $antrian->nomor_antrian = $nextnumber;
        $antrian->tgl_antrian = now();
        $antrian->periode = $bulan;
        $antrian->fiscal_year =  $tahun;
        $antrian->status =  1;


        $antrian->save();

        if(!$antrian->save()){
            App::abort(500, 'Error');
        }else{

            $getunprocess = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 1)->count();

            event(new AmbilAntrian($nextnumber,$jenisantrian, $getunprocess, $nextnumber ));

            return response()->json([
                'message' => ' Antrian nomor '.$nextnumber.' telah ditambahkan.',
                'data'=>[
                    $nextnumber,
                    $getunprocess
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

        $cek_locked = Locksystem::get_status();

        if($cek_locked === false){
            $getnextcall = Antrian::where('tgl_antrian', $tgl_sekarang)
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
                    $updatestatus = Antrian::findorFail($idantrian);
                    $updatestatus->status = 2;
                    $updatestatus->save();

                    $setlock = new Lock();
                    $setlock->user_id =  Auth::user()->id;
                    $setlock->save();

                    $getunprocess = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 1)->count();
                    $getprocessed = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 2)->count();

                    $terbilang = Terbilang::convert($getnextcall[0]->nomor_antrian);

                    $array_audio = PanggilanHelp::get_audio($terbilang);


                    event(new CallAntrian(Auth::user(), $getnextcall[0]->nomor_antrian,$getnextcall[0]->jenisantrian_id, $getunprocess, $getprocessed, $array_audio ));






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

        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();

        $cek_locked = Locksystem::get_status();
        if($cek_locked === false){
            $getnextcall = Antrian::where('tgl_antrian', $tgl_sekarang)
            ->where('status', 2)
            ->orderBy('nomor_antrian','DESC')
            ->get()
            ->take(1);

            if (!$getnextcall->isEmpty()) {
                $message = 'Data Antrian ditemukan';
                $status = true;
                DB::beginTransaction();

                try {

                    $setlock = new Lock();
                    $setlock->user_id =  Auth::user()->id;
                    $setlock->save();

                    $getunprocess = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 1)->count();
                    $getprocessed = Antrian::where('tgl_antrian', $tgl_sekarang)->where('status', 2)->count();

                    $terbilang = Terbilang::convert($getnextcall[0]->nomor_antrian);

                    $array_audio = PanggilanHelp::get_audio($terbilang);

                    event(new CallAntrian(Auth::user(), $getnextcall[0]->nomor_antrian,$getnextcall[0]->jenisantrian_id, $getunprocess, $getprocessed, $array_audio ));
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

    public function settingloket(Request $request)
    {
        $jenisantrian = $request->input('jenisantrian_id');
        $dt = Carbon::now();
        $tgl_sekarang = $dt->toDateString();
        $getunprocess = Antrian::where('tgl_antrian', $tgl_sekarang)->where('jenisantrian_id', $jenisantrian)->where('status', 1)->count();
        $getnextcall = Antrian::where('tgl_antrian', $tgl_sekarang)
            ->where('jenisantrian_id', $jenisantrian)
            ->where('status', 1)
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


        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' =>  $getunprocess

        ]);
    }
}
