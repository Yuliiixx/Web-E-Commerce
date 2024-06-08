<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
        'id_order',
        'id_produk',
        'quantity',
        'price_per_unit',
        'subtotal'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }

    public function product()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
