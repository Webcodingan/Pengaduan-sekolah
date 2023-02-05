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
                <form action="{{ route('aspirasi.update', [$aspirasi->id]) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card">
                        <div class="card-header"><b>Update Aspirasi</b></div>

                        <div class="card-body">
                            <input type="hidden" name="pelaporan_id" value="{{ $aspirasi->pelaporan->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Pilih Status</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Feedback</label>
                                <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror"></textarea>
                                @error('feedback')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
