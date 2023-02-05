@extends('admin.layouts.master')

@section('title')
    Laporan
@endsection

@section('content')
    <div class="container">
        <div class="form-group">
            <div class="row justify-content-center">
            <div class="col-md-12">
        </div>

        <div class="card shadow mb-4 my-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-3">Laporan</h6>
                 <a href="{{ url('/laporan/cetak') }}">
                <button class="btn btn-primary">Export To PDF</button>
            </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                        <tfoot>
                            <tr>
                               <th class="text-center">No</th>
                                <th class="text-center">Nisn</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Lokasi</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($pelaporans) > 0)
                                @foreach ($pelaporans as $key => $pelaporan)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td class="text-center">{{ $pelaporan->siswa->nisn }}</td>
                                        <td class="text-center">{{ $pelaporan->siswa->nama }}</td>
                                        <td class="text-center">{{ $pelaporan->kategori->ket_kategori }}</td>
                                        <td class="text-center">{{ $pelaporan->lokasi }}</td>
                                        <td class="text-center">{{ $pelaporan->aspirasi->feedback }}</td>
                                        <td>
                            @if (empty(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status))
                            <b></b>
                            @else
                            @if (App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status == 'menunggu')
                                <span class="badge badge-danger">Menunggu</span> <br>
                            @elseif (App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status == 'proses')
                                <span class="badge badge-warning">Proses</span> <br>
                            @else
                                <span class="badge badge-success">Selesai</span> <br>
                            @endif
                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td>Tidak ada pengaduan yang dapat di tampilkan ... </td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
