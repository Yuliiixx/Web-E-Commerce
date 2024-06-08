<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|string|in:pending,processing,completed,cancelled',
            'alamat' => 'required'
        ]);

        $order = Order::create($request->all());

        if ($request->has('order_details')) {
            foreach ($request->order_details as $detail) {
                OrderDetail::create([
                    'id_order' => $order->id_order,
                    'id_produk' => $detail['id_produk'],
                    'quantity' => $detail['quantity'],
                    'price_per_unit' => $detail['price_per_unit'],
                    'subtotal' => $detail['subtotal']
                ]);
            }
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::with('orderDetails.product', 'user')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->orderDetails()->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    public function generatePDF($id)
    {
        $order = Order::with('orderDetails.product', 'user')->findOrFail($id);

        $pdf = PDF::loadView('orders.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
}
