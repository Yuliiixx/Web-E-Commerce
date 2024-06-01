<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            
        ]);

        

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
           
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
           
        ]);

        

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
           
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
