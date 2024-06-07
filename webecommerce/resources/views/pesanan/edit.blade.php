@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
    <h1>Edit Pesanan</h1>

    <form action="{{ route('pesanan.update', $pesanan->id_pesanan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user">User:</label>
            <input type="text" id_pesanan="user" name="user" value="{{ $pesanan->user->fullname }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="produk">Produk:</label>
            <input type="text" id_pesanan="produk" name="produk" value="{{ $pesanan->produk->nama_produk }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="no_resi">No Resi:</label>
            <input type="text" id_pesanan="no_resi" name="no_resi" value="{{ $pesanan->no_resi }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" id_pesanan="keterangan" name="keterangan" value="{{ $pesanan->keterangan }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id_pesanan="status" name="status" class="form-control">
                <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processed" {{ $pesanan->status == 'processed' ? 'selected' : '' }}>Processed</option>
                <option value="delivered" {{ $pesanan->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $pesanan->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection


