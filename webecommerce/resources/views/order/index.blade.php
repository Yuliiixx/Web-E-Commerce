<!-- resources/views/order/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">List Pesanan</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th> <!-- Kolom untuk tindakan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->fullname }}</td> <!-- Menampilkan nama pengguna -->
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">Lihat Detail</a> <!-- Tombol untuk melihat detail order -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
