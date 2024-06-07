@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <h1>Daftar Pesanan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Produk</th>
                <th>No Resi</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Aksi</th>
                <!-- <th>Detail</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $index => $pesanan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pesanan->user->fullname }}</td>
                <td>{{ $pesanan->produk->nama_produk }}</td>
                <td>{{ $pesanan->no_resi }}</td>
                <td>{{ $pesanan->status }}</td>
                <td>{{ $pesanan->keterangan }}</td>
                <td>
                    <a href="{{ route('pesanan.edit', $pesanan->id_pesanan) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

