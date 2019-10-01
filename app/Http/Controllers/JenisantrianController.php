<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;
use App\Jenisantrian;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Yajra\Datatables\Datatables;

//Enables us to output flash messaging
use Session;

class JenisantrianController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index()
    {
        $jenisantrian = Jenisantrian::all();
        return view('jenisantrian.index')->with('jenisantrian', $jenisantrian);
    }


    public function create()
    {
        return view('jenisantrian.create');
    }


    public function store(Request $request)
    {
        $nama = $request->get('name');

        $this->validate($request, [
            'name'=>'required|max:120',
        ]);
        $jenisantrian = new Jenisantrian();
        $jenisantrian->name = $request->get('name');
        $jenisantrian->save();

        return redirect()->route('jenisantrian.index')
            ->with('flash_message',
            'Jenis Antrian '. $nama. ' berhasil di tambahkan.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $jenisantrian = Jenisantrian::findOrFail($id);
        return view('jenisantrian.edit', compact('jenisantrian'));
    }


    public function update(Request $request, $id)
    {
        $nama = $request->get('name');

        $jenisantrian = Jenisantrian::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:120',
        ]);
        $jenisantrian->name = $request->get('name');
        $jenisantrian->save();

        return redirect()->route('jenisantrian.index')
            ->with('flash_message',
            'Jenis Antrian '. $nama .' berhasil di edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisantrian = Jenisantrian::findOrFail($id);
        $nama = $jenisantrian->name;
        $jenisantrian->delete();

        return redirect()->route('jenisantrian.index')
            ->with('flash_message',
           'Jenis Antrian '. $nama. ' berhasil dihapus.');
    }
    public function datajenisantrian()
    {

        $jenisantrians = Jenisantrian::select(['id', 'name']);

        return Datatables::of($jenisantrians)

            ->addColumn('action', function($jenisantrian) {
                return view('jenisantrian.datatable.action', compact('jenisantrian'))->render();
            })

            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
}
