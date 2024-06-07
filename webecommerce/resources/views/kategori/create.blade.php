@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kategori</h1>
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-pink">Simpan</button>
    </form>
</div>
@endsection
