<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id_user',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

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
