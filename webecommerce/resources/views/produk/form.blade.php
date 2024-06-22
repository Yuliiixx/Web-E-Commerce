@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>{{ $title }}</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-responsive" style="max-height: 480px; overflow-y: auto; overflow-x: hidden;">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($method === 'PUT')
                @method('PUT')
            @endif
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        <select name="id_kategori" class="form-control">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id_kategori }}" {{ (isset($produk) && $produk->id_kategori == $k->id_kategori) ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Produk:</strong>
                        <input type="text" name="nama_produk" value="{{ $produk->nama_produk ?? '' }}" class="form-control" placeholder="Nama Produk">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gambar:</strong>
                        @if (isset($produk) && $produk->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $produk->gambar) }}" width="100">
                            </div>
                        @endif
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga:</strong>
                        <input type="text" name="harga" value="{{ $produk->harga ?? '' }}" class="form-control" placeholder="Harga" id="harga">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stock:</strong>
                        <input type="text" name="stock" value="{{ $produk->stock ?? '' }}" class="form-control" placeholder="Stock">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan:</strong>
                        <textarea class="form-control" name="keterangan" placeholder="Keterangan">{{ $produk->keterangan ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-pink">{{ $buttonText }}</button>
                </div>
            </div>
        </form>
    </div>

   
@endsection
