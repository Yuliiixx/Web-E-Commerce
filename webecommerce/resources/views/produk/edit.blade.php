<!-- resources/views/produk/edit.blade.php -->

@include('produk.form', [
    'title' => 'Edit Produk',
    'action' => route('produk.update', $produk->id_produk),
    'method' => 'PUT',
    'buttonText' => 'Update',
    'kategori' => $kategori,
    'produk' => $produk,
])
