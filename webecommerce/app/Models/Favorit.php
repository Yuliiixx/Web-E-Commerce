<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'favorit';
    protected $fillable = ['id_produk', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    
}

