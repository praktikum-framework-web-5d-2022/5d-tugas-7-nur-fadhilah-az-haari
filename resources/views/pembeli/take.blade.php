@extends('master')
@section('title','Seblak Maknyos')
@section('menu','active')

@section('content')
<div class="container pt-4 bg-white ">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-light p-4">
                <h2 class="text-center">Ambil Menu Seblak</h2>
                <div class="card-body">
                    <form action="{{route('pembelis.takeStore',['pembeli' => $pembeli->id])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group row">
                                @foreach ($pelayans as $item)
                                <ul class="list-group py-2 col-md-6 ">
                                    <li class="list-group-item">
                                        <input class="form-check-input me-1 px-2" name="pelayan_id[]" type="checkbox" id="{{$item->id}}" value="{{$item->id}}">
                                        <label class="form-check-label px-3" for="{{$item->id}}">{{$item->nama_pelayan}} - {{$item->menu_seblak}}</label>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                            <div class=" my-2 d-flex flex-row-reverse">
                                <button type="submit" class="btn btn-success text-center">Ambil Menu Seblak</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
