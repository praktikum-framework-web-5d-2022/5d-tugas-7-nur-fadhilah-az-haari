@extends('master')
@section('title','Seblak Maknyos')
@section('menu1','active')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success p-4">
                    <h2>Tambah Data Pembeli</h2>
                    <p class="text-center">Silahkan masukkan data dengan benar dan lengkap!</p>
                    @if (session()->has('message'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{route('pembeli.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="no_antrian" class="form-label">Nomer Antrian</label>
                            <input type="text" name="no_antrian" id="no_antrian" placeholder="Masukkan nomer antrian" class="form-control" value="{{old('no_antrian')}}">
                            @error('no_antrian')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" id="nama_pembeli" placeholder="Masukkan Nama Pembeli" class="form-control" value="{{old('nama_pembeli')}}">
                            @error('nama_pembeli')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="level_pedas" class="form-label">Level Pedas</label>
                            <select name="level_pedas" id="level_pedas" class="form-select">
                                <option selected disabled>Pilih Level Pedas</option>
                                <option value="Tidak Pedas" {{old('level_pedas') == "Tidak Pedas" ? "selected" : ""}}>Tidak Pedas</option>
                                <option value="Sedang" {{old('level_pedas') == "Sedang" ? "selected" : ""}}>Sedang</option>
                                <option value="Pedas" {{old('level_pedas') == "Pedas" ? "selected" : ""}}>Pedas</option>
                            </select>
                            @error('level_pedas')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class=" d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-outline-success">Tambah Data Pembeli</button>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
