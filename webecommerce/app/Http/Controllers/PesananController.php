<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with(['user', 'produk'])->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function edit($id_pesanan)
    {
        $pesanan = Pesanan::with(['user', 'produk'])->findOrFail($id_pesanan);
        return view('pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, $id_pesanan)
    {
        $pesanan = Pesanan::findOrFail($id_pesanan);
        $pesanan->status = $request->input('status');
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }
}
