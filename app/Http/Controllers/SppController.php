<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Spps;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spps::paginate(10);
        return view('admin.spp.data-spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spp.data-spp.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => 'required',
            'nominal' => 'required|integer|min:1',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Spps::create($request->all());
        return redirect("/data-spp")->with('success','Data SPP berhasil ditambahkan.');
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
            'tahun' => 'required',
            'nominal' => 'required|integer|min:1',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $spp = Spps::findOrFail($id);
        $spp->tahun = $request->input('tahun');
        $spp->nominal = $request->input('nominal');
        $spp->save();
    
        return redirect('data-spp') ->withSuccess('Data SPP berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Spps::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Data SPP Berhasil Dihapus");
    }
}
