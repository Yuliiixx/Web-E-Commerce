<!-- resources/views/produk/create.blade.php -->

@include('produk.form', [
    'title' => 'Tambah Produk',
    'action' => route('produk.store'),
    'method' => 'POST',
    'buttonText' => 'Submit',
    'kategori' => $kategori,
])
