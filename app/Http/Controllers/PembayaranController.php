<?php

namespace App\Http\Controllers;

use PDF;
use Validator;
use Carbon\Carbon;
use App\Models\Spps;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = DB::table('users')
            ->where('level', 'siswa')
            ->get();
        $spps = Spps::all();
        $pembayaran = Pembayaran::with('user','spps')->get();
        return view('admin.spp.pembayaran.index', compact('siswa','spps','pembayaran'));
    }

    public function cetakLaporanPDF($id)
    {
        $siswa = DB::table('users')
            ->where('level', 'siswa')
            ->get();
        $spps = Spps::all();
        $pembayaran = Pembayaran::with('user','spps')->find($id);

        $pdf = PDF::loadView('pembayaran', compact('siswa','spps','pembayaran'));
        return $pdf->download('pembayaran' . $pembayaran->id . '.pdf');
    }

    // Laporan 
    public function LaporanSemua (){
        $siswa = DB::table('users')
            ->where('level', 'siswa')
            ->get();
        $spps = Spps::all();
        $pembayaran = Pembayaran::with('user','spps')->get();
        return view('admin.laporan.all-laporan', compact('siswa','spps','pembayaran'));
    }

    public function laporan(Request $request)
    {
        $tanggal = $request->input('tgl_bayar');
        $laporan = DB::table('pembayarans')
                ->whereDate('tgl_bayar', $tanggal)
                ->join('users', 'pembayarans.user_id', '=', 'users.id')
                ->join('spps', 'pembayarans.spps_id', '=', 'spps.id')
                ->select('pembayarans.*', 'users.nama', 'spps.tahun','spps.nominal')
                ->get();
        return view('admin.laporan.tanggal', ['laporan' => $laporan]);
    }

    public function history() {
        $siswa = DB::table('users')
            ->where('level', 'siswa')
            ->get();
        $spps = Spps::all();
        $pembayaran = Pembayaran::with('user','spps')->get();
        return view('admin.spp.pembayaran.history', compact('siswa','spps','pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = DB::table('users')
        ->where('level', 'siswa')
        ->get();
        $spps = Spps::all();
        $pembayaran = Pembayaran::with('user','spps')->get();
        return view('admin.spp.pembayaran.add', compact('siswa','spps','pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'spps_id' => 'required',
            'tgl_bayar' => 'required|date',
            'bulan_bayar' => 'required|array',
            'status' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $input = $request->all();
        $pembayaran = implode(',', $request->bulan_bayar);
        $total_bayar = 0; // inisialisasi total bayar menjadi 0
        $bulan_bayar = count($request->bulan_bayar); // ambil jumlah bulan bayar dari input form
        $spps = Spps::find($request->spps_id); // ambil data SPPS dari database
        
        // hitung total bayar dengan mengalikan nominal dengan jumlah bulan bayar
        $total_bayar = $spps->nominal * $bulan_bayar;
        
        Pembayaran::create([
            'user_id' => $request->user_id,
            'spps_id' => $request->spps_id,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $pembayaran,
            'jumlah_bayar' => $total_bayar, // total jumlah bayar
            'status' => $request->status,
        ]);

        return redirect('/data-pembayaran')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function getHistoryPembayaranSiswa()
    {
        $siswa = Auth::user();
        $spps = Spps::all();
        $historyPembayaran = Pembayaran::where('user_id', $siswa->id)->get();
        return view('siswa.history', compact('historyPembayaran', 'spps','siswa'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
