@extends('master')
@section('title','Seblak Maknyos')
@section('menu','active')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-success p-4">
                    <a href="{{route('pelayan.create')}}" class="btn btn-outline-success p-3 mb-4">
                        <h5 class="mb-0"> Tambah Data Pelayan </h5>
                    </a>
                    @if (session()->has('message'))
                        <div class="mb-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                    <div class="bdr table-responsive">
                        <table class="table">
                            <thead class="bg-success text-white">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Kode Pelayan</th>
                                    <th>Nama Pelayan</th>
                                    <th>Menu Seblak</th>
                                    <th>Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pelayans as $pelayan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pelayan->kode_pelayan}}</td>
                                        <td>{{$pelayan->nama_pelayan}}</td>
                                        <td>{{$pelayan->menu_seblak}}</td>
                                        <td>
                                            @forelse ($pelayan->pembelis as $item)
                                                {{$item->nama_pembeli}}
                                                <br>
                                            @empty
                                                Tidak ada pembeli . . .
                                            @endforelse
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('pelayan.destroy',$pelayan->id) }}" method="POST">
                                                <a href="{{ route('pelayan.edit',$pelayan->id) }}" class="btn btn-success">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="6">Tidak ada data . . .</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
