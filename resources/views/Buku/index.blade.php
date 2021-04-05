@extends('buku.layout')
@section('content')
<div class="row m-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2 mb-3">
            <h2>Perpustakaan</h2>
        </div>
        <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('buku.index') }}" role="search">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Keyword" value="{{request()->query('keyword')}}">
            </div>
            <button type="submit" class="btn btn-primary mx-2">Cari</button>
            <a href="{{ route('buku.index') }}">
                <button type="button" class="btn btn-danger">Reset</button>
            </a>
        </form>
        <div class="my-2">
            <a class="btn btn-success" href="{{ route('buku.create') }}"> Input Buku </a>
        </div>
    </div>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>judul</th>
            <th>penulis</th>
            <th>Kategory</th>
            <th>penerbit</th>
            <th>Jumlah</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($list_buku as $buku)
        <tr>
            <td>{{$buku->judul}}</td>
            <td>{{$buku->penulis}}</td>
            <td>{{$buku->kategory}}</td>
            <td>@currency($buku->penerbit)</td>
            <td>{{$buku->jumlah}}</td>
            <td>
                <form action="{{route('buku.destroy', $buku->id_buku) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('buku.show', $buku->id_buku) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('buku.edit', $buku->id_buku) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="d-flex">
        {{ $list_buku->links('pagination::bootstrap-4') }}
    </div>
</div>