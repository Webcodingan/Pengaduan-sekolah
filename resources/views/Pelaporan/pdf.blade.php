<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="title text-center mb-5">
        <h2>Laporan Pengaduan Sekolah</h2>
        <h4>Cinta Kasih Tzu Chi</h4>
    </div>

    <div class="table-responsive">
        <table class="table tabel-hover" id="example1" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nisn</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Lokasi</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelaporans as $key => $pelaporan)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td class="text-center">{{ $pelaporan->siswa->nisn }}</td>
                        <td class="text-center">{{ $pelaporan->siswa->nama }}</td>
                        <td class="text-center">{{ $pelaporan->kategori->ket_kategori }}</td>
                        <td class="text-center">{{ $pelaporan->lokasi }}</td>
                        <td class="text-center">{{ $pelaporan->aspirasi->status }}</td>
                        <td class="text-center">{{ $pelaporan->aspirasi->feedback }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
