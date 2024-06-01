@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-12 mb-4">
            <h1 class="display-4">Welcome to Fashionista</h1>
            <p class="lead">Explore our stylish sections using the sidebar menu.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text display-4">{{ $kategori }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text display-4">{{ $produk }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
