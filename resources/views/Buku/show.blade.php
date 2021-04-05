@extends('buku.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Buku
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>judul: </b>{{$buku->judul}}</li>
                    <li class="list-group-item"><b>penulis: </b>{{$buku->penulis}}</li>
                    <li class="list-group-item"><b>Kategory: </b>{{$buku->kategory}}</li>
                    <li class="list-group-item"><b>Hpenerbit: </b>@currency($buku->penerbit)</li>
                    <li class="list-group-item"><b>Jumlah: </b>{{$buku->jumlah}}</li>
                </ul>
            </div>
            <a class="btn btn-success mx-3" href="{{ route('buku.index') }}">Kembali</a>
            <div class="d-flex justify-content-between">
                <a class="btn m-3 {{isset($prev->id_buku) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($prev->id_buku) ? route('buku.show', $prev->id_buku) : '' }}"><i class="fas fa-chevron-left"></i> Sebelumnya</i></a>
                <a class="btn m-3 {{isset($next->id_buku) ? 'btn-outline-primary' : 'disabled' }}" href="{{ isset($next->id_buku) ? route('buku.show', $next->id_buku) : '' }}">Selanjutnya <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection