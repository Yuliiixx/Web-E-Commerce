@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Orderan Customer</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Tanggal</th>
                    <th>Total Belanja</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->user->fullname }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id_order) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('orders.edit', $order->id_order) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
