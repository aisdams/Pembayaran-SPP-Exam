<!Doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />

</head>
<body>

    
<div class="relative overflow-x-auto mx-10">
    <h1 class="text-center my-10 text-[30px]">History SPP</h1>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Siswa
                </th>
                <th scope="col" class="px-6 py-3">
                    Nominal
                </th>
                <th scope="col" class="px-6 py-3">
                    Bulan Bayar
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Bayar
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah Bayar
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach ($historyPembayaran as $pembayaran)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $pembayaran->user->nama }}
                </td>
                <td class="px-6 py-4">
                    RP. {{ number_format($pembayaran->spps->nominal) }}
                </td>
                <td class="px-6 py-4">
                    {{ $pembayaran->bulan_bayar }}
                </td>
                <td class="px-6 py-4">
                    {{ date('d-F-Y', strtotime($pembayaran->tgl_bayar)) }}
                </td>
                <td class="px-6 py-4">
                    RP. {{ number_format($pembayaran->jumlah_bayar) }}
                </td>
                <td class="px-6 py-4">
                    {{ $pembayaran->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>