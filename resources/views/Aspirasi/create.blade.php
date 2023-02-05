@extends('admin.layouts.master')

@section('title')
    Aspirasi
@endsection

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <form action="{{ route('aspirasi.store') }}" method="POST">
                    @csrf

                    <div class="card">
                        <div class="card-header"><b>Beri Aspirasi</b></div>

                        <div class="card-body">
                            <input type="hidden" name="pelaporan_id" value="{{ $pelaporan->id }}">
                            <input type="hidden" name="siswa_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="menunggu">Menunggu</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Feedback</label>
                                <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror">
                        </textarea>
                                @error('feedback')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
