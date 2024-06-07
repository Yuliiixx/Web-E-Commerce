<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index($orderId)
    {
        $orderDetails = OrderDetail::where('id_order', $orderId)->get();
        return view('order_detail.index', compact('orderDetail'));
    }
}
