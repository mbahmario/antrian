<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Carbon;
use App\Countertpp;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Yajra\Datatables\Datatables;

//Enables us to output flash messaging
use Session;

class CountertppController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index()
    {
        $countertpp = Countertpp::all();
        return view('countertpp.index')->with('countertpp', $countertpp);
    }


    public function create()
    {
        $users = User::get()->pluck('name', 'id')->toArray();
        return view('countertpp.create',compact('users'));
    }


    public function store(Request $request)
    {
        $nama = $request->get('name');

        $this->validate($request, [
            'name'=>'required|max:120',
            'user_id'=>'required|integer',
        ]);
        $countertpp = new Countertpp();
        $countertpp->name = $request->get('name');
        $countertpp->user_id = $request->get('user_id');
        $countertpp->save();

        return redirect()->route('countertpp.index')
            ->with('flash_message',
            'Konter Pendaftaran '. $nama. ' berhasil di tambahkan.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $users = User::get()->pluck('name', 'id')->toArray();
        $countertpp = Countertpp::findOrFail($id);
        return view('countertpp.edit', compact('countertpp','users'));
    }


    public function update(Request $request, $id)
    {
        $nama = $request->get('name');

        $countertpp = Countertpp::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
            'user_id'=>'required|integer',
        ]);
        $countertpp->name = $request->get('name');
        $countertpp->user_id = $request->get('user_id');
        $countertpp->save();

        return redirect()->route('countertpp.index')
            ->with('flash_message',
            'Konter Pendaftaran '. $nama .' berhasil di edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countertpp = Countertpp::findOrFail($id);
        $nama = $countertpp->name;
        $countertpp->delete();

        return redirect()->route('countertpp.index')
            ->with('flash_message',
           'Konter Pendaftaran '. $nama. ' berhasil dihapus.');
    }
    public function datacountertpp()
    {

        $countertpps = Countertpp::with('user')->select('*');

        return Datatables::of($countertpps)

            ->addColumn('action', function($countertpp) {
                return view('countertpp.datatable.action', compact('countertpp'))->render();
            })

            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
}
