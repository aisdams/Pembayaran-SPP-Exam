<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Spps;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $kelas = Kelas::all();
        $spps = Spps::all();
        $siswa = User::where('level', 'siswa')->with('kelas','spps')->get();
        return view('admin.data-siswa.index', compact('kelas','spps','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spps = Spps::all();
        $siswa = User::where('level', 'siswa')->with('kelas','spps')->get();
        return view('admin.data-siswa.add', compact('kelas','spps','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => ['required', 'string', 'max:255', Rule::unique('users')],
            'nis' => ['required', 'string', 'max:255', Rule::unique('users')],
            'username' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'kelas_id' => ['required', 'exists:kelas,id'],
            'spps_id' => ['required', 'exists:spps,id'],
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }

        $siswa = new User();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->username = $request->username;
        $siswa->nama = $request->nama;
        $siswa->password = bcrypt($request->password);
        $siswa->level = 'siswa';
        $siswa->kelas_id = $request->kelas_id;

        $siswa->spps_id = $request->spps_id;
        $siswa->save($request->all());

        return redirect('data-siswa')->with('success', 'Data siswa berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'nis' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'usernama' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput()->with('msg', 'Something Wrong');
        }
        $siswa = User::findOrFail($id);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->username = $request->username;
        $siswa->nama = $request->nama;
        if (!empty($request->password)) {
            $siswa->password = bcrypt($request->password);
        }
        $siswa->save();

        return redirect('data-siswa')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data Siswa Berhasil Dihapus");
    }
}
