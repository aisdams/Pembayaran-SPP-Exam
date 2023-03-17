@extends('admin.layout')
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
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Nominal</th>
                                <th>Bulan Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $idx)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $idx->user->nama }}</td>
                                    <td>{{ $idx->spps->nominal }}</td>
                                    <td>{{ $idx->bulan_bayar }}</td>
                                    <td>{{ date('d-F-Y', strtotime($idx->tgl_bayar)) }}</td>
                                    <td>RP. {{ number_format($idx->jumlah_bayar) }}</td>
                                    <td>{{ $idx->status }}</td>
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