<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'transaction_type', 
        'jumlah', 
        'description', 
        'date', 
        'category', 
        'payment_method', 
        'reference_number', 
        'id_user', 
        'id_order', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
