@extends('master')
@section('title','Seblak Maknyos')
@section('menu1','active')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-light p-4">
                    <a href="{{route('pembeli.create')}}" class="btn btn-outline-success p-3 mb-4 ">
                        <h5 class="mb-0"> Tambah Data Pembeli</h5>
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
                                    <th>Nomer Antrian</th>
                                    <th>Nama Pembeli</th>
                                    <th>Level Pedas</th>
                                    <th>Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembelis as $pembeli)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pembeli->no_antrian}}</td>
                                        <td>{{$pembeli->nama_pembeli}}</td>
                                        <td>{{$pembeli->level_pedas}}</td>
                                        <td>
                                            @forelse ($pembeli->pelayans as $item)
                                                {{$item->menu_seblak}}
                                                <br>
                                            @empty
                                                Tidak ada pesanan . . .
                                            @endforelse
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('pembeli.destroy',$pembeli->id) }}" method="POST">
                                                <a href="{{ route('pembelis.take',$pembeli->id) }}" class="btn btn-warning">Pesanan</a>
                                                <a href="{{ route('pembeli.edit',$pembeli->id) }}" class="btn btn-success">Edit</a>
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
