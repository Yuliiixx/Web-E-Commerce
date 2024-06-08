<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'id_order' => 'required|exists:orders,id_order',
            'id_produk' => 'required|exists:produk,id_produk',
            'quantity' => 'required|numeric',
            'price_per_unit' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Simpan detail pesanan baru
        OrderDetail::create($request->all());

        return redirect()->route('orders.show', $request->id_order)->with('success', 'Order detail created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'quantity' => 'required|numeric',
            'price_per_unit' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Update detail pesanan
        $orderDetail = OrderDetail::find($id);
        $orderDetail->update($request->all());

        return redirect()->route('orders.show', $orderDetail->id_order)->with('success', 'Order detail updated successfully.');
    }

    public function destroy($id)
    {
        // Temukan detail pesanan
        $orderDetail = OrderDetail::find($id);

        // Hapus detail pesanan
        $orderDetail->delete();

        return redirect()->route('orders.show', $orderDetail->id_order)->with('success', 'Order detail deleted successfully.');
    }
}
