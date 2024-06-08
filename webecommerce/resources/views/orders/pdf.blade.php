<!DOCTYPE html>
<html>
<head>
    <title>Order Details PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>Order Details</h2>
    <!-- <p><strong>Order ID:</strong> {{ $order->id_order }}</p> -->
    <p><strong>Nama:</strong> {{ $order->user->fullname }}</p>
    <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
    <p><strong>Tanggal:</strong> {{ $order->order_date }}</p>
    <p><strong>Total Belanja:</strong> {{ $order->total_amount }}</p>
    <!-- <p><strong>Status:</strong> {{ $order->status }}</p> -->
    
    <h3>Order Items</h3>
    <table>
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
</body>
</html>
