<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Semua nya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <a href="{{ URL::previous() }}" class="btn btn-outline-danger m-3">Go Back</a>
    <div class="textnya mt-5 text-center mb-3">
        <h1>Laporan Transaksi Pembayaran SPP</h1>
        <p >Jalan 145 Anam-ro, Seongbuk-gu, Seoul, Korea Selatan</p>
    </div>
    <table class="table table-bordered">
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
          @php
           $no = 1;
          @endphp
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>