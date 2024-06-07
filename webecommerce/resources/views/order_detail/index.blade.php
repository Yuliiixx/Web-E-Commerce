<!-- resources/views/order_details/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">List Detail Pesanan</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->id_order }}</td>
                    <td>{{ $detail->id_produk }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->created_at }}</td>
                    <td>{{ $detail->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
