@extends('admin.layouts.master')

@section('title')
Siswa
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <div class="card shadow mb-4 my-5">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Siswa</h6>
                    </div>

                    <form action="{{ route('siswa.store') }}" method="POST">
                        {{-- enctype="multipart/form-data --}}
                        @csrf
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nisn">Nisn</label>
                                <input id="nisn" type="text" name="nisn" value="{{ old('nisn') }}"
                                    class="form-control @error('nisn') is-invalid @enderror">
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" value="{{ old('alamat') }}"
                                    class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="10">        </textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>

                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
