@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Create Transaction</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="table-responsive" style="max-height: 410px; overflow-y: auto;">
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="transaction_type">Tipe:</label>
            <select name="transaction_type" class="form-control" id="transaction_type">
                <option value="Pemasukan">Pemasukan</option>
                <option value="Pengeluaran">Pengeluaran</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" name="jumlah" class="form-control" id="jumlah">
        </div>
        
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <input type="text" name="description" class="form-control" id="description">
        </div>
        
        <div class="form-group">
            <label for="date">Tanggal:</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>
        
        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" name="category" class="form-control" id="category">
        </div>
        
        <div class="form-group">
            <label for="payment_method">Cara Pembayaran:</label>
            <input type="text" name="payment_method" class="form-control" id="payment_method">
        </div>
        <div class="form-group">
            <label for="reference_number">Nomor Referensi:</label>
            <input type="text" name="reference_number" class="form-control" id="reference_number">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" id="status" value="pending">
        </div>
        
        
        
        <div class="form-group">
            <button type="submit" class="btn btn-pink">Submit</button>
        </div>
    </form>
    </div>
</div>
@endsection
