@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Details</h2>
        <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
        <!-- <p><strong>Order ID:</strong> {{ $order->id_order }}</p> -->
        <p><strong>Nama:</strong> {{ $order->user->fullname }}</p>
        <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
        <p><strong>Tanggal:</strong> {{ $order->order_date }}</p>
        <p><strong>Total Belanja:</strong> {{ $order->total_amount }}</p>
        <!-- <p><strong>Status:</strong> {{ $order->status }}</p> -->

        <a href="{{ route('orders.generatePDF', $order->id_order) }}" class="btn btn-pink">Cetak PDF</a>
        
        <h3 class="mt-4">Order Items</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Harga Per Unit</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $detail)
                    <tr>
                        <td>{{ $detail->product->nama_produk }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->price_per_unit }}</td>
                        <td>{{ $detail->subtotal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
