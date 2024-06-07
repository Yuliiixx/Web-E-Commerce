<!-- resources/views/order/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Detail Pesanan</h1>

    <div class="card">
        <div class="card-header">
            Pesanan #{{ $order->id }}
        </div>
        <div class="card-body">
            <p><strong>User Name:</strong> {{ $order->user ? $order->user->fullname : 'Pengguna tidak ditemukan' }}</p>
            <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $order->updated_at }}</p>
        </div>
    </div>

    <h2 class="mt-4">Detail Barang dalam Pesanan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetail as $detail)
                <tr>
                    <td>{{ $detail->id_produk }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
