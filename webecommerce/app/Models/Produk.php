<?php

// app/Models/Produk.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori', 'nama_produk', 'gambar', 'harga', 'stock', 'keterangan'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function pesanan()
{
    return $this->hasMany(Pesanan::class);
}
 // Definisikan relasi favorits di sini
 public function favorits()
 {
     return $this->hasMany(Favorit::class, 'id_produk');
 }

}
