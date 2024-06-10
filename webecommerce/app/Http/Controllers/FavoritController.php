<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorit;
use App\Models\Produk;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    public function index()
    {
        // Ambil semua data favorit
        $favorits = Favorit::all();
        
        // Hitung produk yang paling favorit
        $mostFavoritedProduct = Produk::withCount('favorits')
            ->orderBy('favorits_count', 'desc')
            ->first();

        return view('favorits.index', compact('favorits', 'mostFavoritedProduct'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan favorit baru
    }

    public function store(Request $request)
    {
        // Menyimpan data favorit baru
    }

    // Metode lainnya
}
