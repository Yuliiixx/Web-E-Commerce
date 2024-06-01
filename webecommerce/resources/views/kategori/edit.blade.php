@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
