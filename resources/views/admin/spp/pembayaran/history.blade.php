@extends('admin.layout')
@section('judul','History Pembayaran')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">History Pembayaran</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw-bold text-center">#</th>
                                <th class="fw-bold text-center">Nama Siswa</th>
                                <th class="fw-bold text-center">Nominal</th>
                                <th class="fw-bold text-center">Bulan Bayar</th>
                                <th class="fw-bold text-center">Tanggal Bayar</th>
                                <th class="fw-bold text-center">Jumlah Bayar</th>
                                <th class="fw-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $idx)
                                <tr>
                                    <td class="fw-semibold text-center fs-6">{{ $loop->iteration }}</td>
                                    <td class="text-center fs-6">{{ $idx->user->nama }}</td>
                                    <td class="text-center fs-6">{{ $idx->spps->nominal }}</td>
                                    <td class="text-center fs-6">{{ $idx->bulan_bayar }}</td>
                                    <td class="text-center fs-6">{{ date('d-F-Y', strtotime($idx->tgl_bayar)) }}</td>
                                    <td class="text-center fs-6">RP. {{ number_format($idx->jumlah_bayar) }}</td>
                                    <td class="text-center fs-6">{{ $idx->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection