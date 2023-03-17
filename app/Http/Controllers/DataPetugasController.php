<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class DataPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('level', 'petugas')->get();
        return view('admin.data-petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = User::all();
        return view('admin.data-petugas.add', compact('petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas'=>'required|string',
            'username'=>'required|string',
            'level'=>'required',
            'password' => 'required|string|min:6'
        ]);

        $petugas_nama = $request->nama_petugas;
        $username = $request->username;
        $level = $request->level;
        $password = bcrypt($request->password);

        $id_petugas = Helper::IDGenerator(new User, 'id_petugas', 2, 'STD'); /** Generate id */
        
        $q = new User;
        $q->id_petugas = $id_petugas;
        $q->nama_petugas = $petugas_nama;
        $q->username = $username;
        $q->level = $level;
        $q->password = $password;
        $save =  $q->save();

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        return redirect("data-petugas")->with('success', 'Data petugas berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::find($id);
        $petugas->update($request->all());
        return redirect("/data-petugas")->with('success','Data Petugas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Petugas Berhasil Di Delete");
    }
}
