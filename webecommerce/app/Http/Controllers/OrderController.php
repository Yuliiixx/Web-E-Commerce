<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        return view('order.index', compact('order'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }
}
