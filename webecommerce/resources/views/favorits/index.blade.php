@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Favorit</h2>

        @if ($mostFavoritedProduct)
            <div class="alert alert-info">
                <strong>Produk Paling Favorit:</strong> {{ $mostFavoritedProduct->nama_produk }} 
                ({{ $mostFavoritedProduct->favorits_count }} favorit)
                <div>
                    <img src="{{ asset('images/' . $mostFavoritedProduct->gambar) }}" width="100">
                </div>
            </div>
        @endif
        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Gambar</th>
                    <th>User</th>
               
                </tr>
            </thead>
            <tbody>
                @foreach ($favorits as $index => $favorit)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $favorit->produk->nama_produk }}</td>
                        <td><img src="{{ asset('images/' . $favorit->produk->gambar) }}" width="100"></td>
                        <td>{{ $favorit->user->fullname }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
