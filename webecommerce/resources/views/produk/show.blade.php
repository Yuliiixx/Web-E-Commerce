@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    <div class="card">
        <div class="card-header">
            {{ $produk->nama_produk }}
        </div>
       
        <div class="card-body">
            
            <h5 class="card-title">Kategori: {{ $produk->kategori->nama_kategori }}</h5>
            <p class="card-text">{{ $produk->keterangan }}</p>
            <p class="card-text">Harga: {{ $produk->harga }}</p>
        
            <img src="{{ asset('images/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" width="200">
        </div>
      
    </div>
    <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
