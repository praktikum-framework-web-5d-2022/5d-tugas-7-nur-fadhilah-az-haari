@extends('master')
@section('title','Seblak Maknyos')
@section('menu','active')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-light p-4">
                    <h2 class="text-center">Edit Data Pelayan</h2>
                    <p class="text-center">Silahkan masukkan data dengan benar dan lengkap!</p>
                    @if (session()->has('message'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{route('pelayan.update', ['pelayan' => $pelayan->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-4">
                            <label for="kode_pelayan" class="form-label">Kode Pelayan</label>
                            <input type="text" name="kode_pelayan" id="kode_pelayan" placeholder="Masukkan Kode Pelayan" class="form-control" value="{{old('kode_pelayan') ?? $pelayan->kode_pelayan}}">
                            @error('kode_pelayan')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nama_pelayan" class="form-label">Nama Pelayan</label>
                            <input type="text" name="nama_pelayan" id="nama_pelayan" placeholder="Masukkan Nama Pelayan" class="form-control" value="{{old('nama_pelayan') ?? $pelayan->nama_pelayan}}">
                            @error('nama_pelayan')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="menu_seblak" class="form-label">Menu Seblak</label>
                            <select name="menu_seblak" id="menu_seblak" class="form-select">
                                <option selected disabled>Pilih Menu Seblak</option>
                                <option value="Seblak Biasa" {{old('menu_seblak') ?? $pelayan->menu_seblak == "Seblak Biasa" ? "selected" : ""}}>Seblak Biasa</option>
                                <option value="Seblak Tulang" {{old('menu_seblak') ?? $pelayan->menu_seblak == "Seblak Tulang" ? "selected" : ""}}>Seblak Tulang</option>
                                <option value="Seblak Mie" {{old('menu_seblak') ?? $pelayan->menu_seblak == "Seblak Mie" ? "selected" : ""}}>Seblak Mie</option>
                                <option value="Seblak Seafood" {{old('menu_seblak') ?? $pelayan->menu_seblak == "Seblak Seafood" ? "selected" : ""}}>Seblak Seafood</option>
                                <option value="Seblak Komplit" {{old('menu_seblak') ?? $pelayan->menu_seblak == "Seblak Komplit" ? "selected" : ""}}>Seblak Komplit</option>
                            </select>
                            @error('menu_seblak')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success">Edit Data Pelayan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
