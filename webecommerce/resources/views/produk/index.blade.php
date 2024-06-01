@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <h2>Produk</h2>
                <div>
                    <form action="{{ route('produk.index') }}" method="GET" class="d-inline-block">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request()->get('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-pink ml-2" href="{{ route('produk.create') }}"> Tambah Produk</a>
                </div>
            </div>
        </div>

        <!-- Tambahkan formulir filter -->
        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('produk.index') }}" method="GET">
                    <div class="input-group">
                        <select name="id_kategori" class="form-control">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategori as $category)
                                <option value="{{ $category->id_kategori }}" {{ request()->get('id_kategori') == $category->id_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

       

        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th width="280px">Action</th>
                </tr>
                @php $i = 0; @endphp
                @foreach ($produk as $p)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>{{ $p->kategori->nama_kategori }}</td>
                        <td><img src="{{ asset('images/' . $p->gambar) }}" width="100"></td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>
                            <form action="{{ route('produk.destroy', $p->id_produk) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('produk.show', $p->id_produk) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('produk.edit', $p->id_produk) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
@endsection
