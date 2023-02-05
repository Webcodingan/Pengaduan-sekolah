@extends('admin.layouts.master')

@section('title')
    Show Pengaduan
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header">
                                <b>Detail Pelaporan</b>
                            </div>

                            <div class="card-body">
                                Nisn : <b>{{ $pelaporan->siswa->nisn }}</b><br>
                                Nama : <b>{{ $pelaporan->siswa->nama }}</b><br>
                                Kategori : <b>{{ $pelaporan->kategori->ket_kategori }}</b><br>
                                Lokasi : <b>{{ $pelaporan->lokasi }}</b><br>
                                Keterangan : <b>{{ $pelaporan->keterangan }}</b><br>
                                Status Laporan :
                                @if (empty(App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->latest()->first()->status
                                    ))
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

                                {{-- @if ($pelaporan->aspirasi->status == 'menunggu')
                                    <span class="badge badge-danger">Menunggu</span> <br>
                                @elseif ($pelaporan->aspirasi->status == 'proses')
                                    <span class="badge badge-warning">Proses</span> <br>
                                @else
                                    <span class="badge badge-success">Selesai</span> <br>
                                @endif --}}

                                <br>

                                Aspirasi : @if (empty($pelaporan->aspirasi->feedback))
                                    <b>belum ada tanggapan</b>
                                @else
                                    <b>{{ $pelaporan->aspirasi->feedback }}</b>
                                @endif

                                <br>
                                <br>

                                @foreach (App\Models\Aspirasi::where('pelaporan_id', $pelaporan->id)->get() as $aspirasi)
                                    <b>{{ $aspirasi->created_at }} - {{ $aspirasi->feedback }}</b><br>
                                @endforeach

                                <br>

                                <div class="form-group">
                                    <a href="{{ route('aspirasi.show', [$pelaporan->id]) }}">
                                        <button class="btn btn-primary">Beri Aspirasi</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
