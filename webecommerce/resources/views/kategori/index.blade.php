@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-pink">Tambah Kategori</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
            @foreach($kategori as $k)
                <tr>
                <td>{{ ++$i }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                   
                    <td>
                        <a href="{{ route('kategori.edit', $k->id_kategori) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('kategori.destroy', $k->id_kategori) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
