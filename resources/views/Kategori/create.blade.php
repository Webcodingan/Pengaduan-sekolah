@extends('admin.layouts.master')

@section('title')
Kategori
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
                        <h6 class="m-0 font-weight-bold text-primary">Create Kategori</h6>
                    </div>

                    <form action="{{ route('kategori.store') }}" method="POST">
                        {{-- enctype="multipart/form-data --}}
                        @csrf
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ket_kategori">Kategori</label>
                                <input id="ket_kategori" type="text" name="ket_kategori"
                                    value="{{ old('ket_kategori') }}"
                                    class="form-control @error('ket_kategori') is-invalid @enderror">
                                @error('ket_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
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
                        class="form-control @error('alamat') is-invalid @enderror"
                        cols="30" rows="10">        </textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

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
