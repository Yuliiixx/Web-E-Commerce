<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
   

    public function index() {
        $kategori = Kategori::count();
        $produk = Produk::count();
    
        return view('home', compact('kategori', 'produk'));
    }
    
}
