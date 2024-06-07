<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    
    public function index(Request $request)
    {
        $id_kategori = $request->get('id_kategori');
        
        if ($id_kategori) {
            $produk = Produk::where('id_kategori', $id_kategori)->get();
        } else {
            $produk = Produk::all();
        }
    
        $kategori = Kategori::all(); // Pastikan Anda mendapatkan semua kategori untuk dropdown filter
    
              

    $query = Produk::query();

    // Filter by category
    if ($request->has('id_kategori') && $request->id_kategori != '') {
        $query->where('id_kategori', $request->id_kategori);
    }

    // Search by product name
    if ($request->has('search') && $request->search != '') {
        $query->where('nama_produk', 'LIKE', '%' . $request->search . '%');
    }

    $produk = $query->get();
    $kategori = Kategori::all();

    return view('produk.index', compact('produk', 'kategori'));


    }
    

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'gambar' => $imageName,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk created successfully.');
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
            $produk->gambar = $imageName;
        }

        $produk->id_kategori = $request->id_kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stock = $request->stock;
        $produk->keterangan = $request->keterangan;

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk deleted successfully.');
    }

    public function filterByKategori(Request $request)
{
    $id_kategori = $request->id_kategori;
    if ($id_kategori) {
        $produk = Produk::where('id_kategori', $id_kategori)->get();
    } else {
        $produk = Produk::all();
    }
    return view('produk.filter', compact('produk'));
}



}
