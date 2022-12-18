@extends('master')
@section('title','Seblak Maknyos')
@section('menu1','active')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light p-4">
                    <h2 class="text-center">Edit Data Pembeli</h2>
                    <p class="text-center">Silahkan masukkan data dengan benar dan lengkap!</p>
                    @if (session()->has('message'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{route('pembeli.update', ['pembeli' => $pembeli->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-4">
                            <label for="no_antrian" class="form-label">Nomer Antrian</label>
                            <input type="text" name="no_antrian" id="no_antrian" placeholder="Masukkan Nomer Antrian" class="form-control" value="{{old('no_antrian') ?? $pembeli->no_antrian}}">
                            @error('no_antrian')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" id="nama_pembeli" placeholder="Masukkan Nama Pembeli" class="form-control" value="{{old('nama_pembeli') ?? $pembeli->nama_pembeli}}">
                            @error('nama_pembeli')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="level_pedas" class="form-label">Level Pedas</label>
                            <select name="level_pedas" id="level_pedas" class="form-control">
                                <option selected disabled>Pilih Level Pedas</option>
                                <option value="Tidak Pedas" {{old('level_pedas') ?? $pembeli->level_pedas == "Tidak Pedas" ? "selected" : ""}}>Tidak Pedas</option>
                                <option value="Sedang" {{old('level_pedas') ?? $pembeli->level_pedas == "Sedang" ? "selected" : ""}}>Sedang</option>
                                <option value="Pedas" {{old('level_pedas') ?? $pembeli->level_pedas == "Pedas" ? "selected" : ""}}>Pedas</option>
                            </select>
                            @error('level_pedas')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-success">Edit Data Pembeli</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
