@extends('buku.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Buku
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('buku.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul">
                    </div>
                    <div class="form-group">
                        <label for="Kategori">Kategori</label>
                        <select name="kategori" id="Kategori" class="form-control">
                            <option value="Komputer">komputer</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Sains">Sains</option>
                            <option value="Agama">Agama</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="penerbit" aria-describedby="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="Jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" id="Jumlah" aria-describedby="Jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection