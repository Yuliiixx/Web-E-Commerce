@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Transaction</h2>

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
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="transaction_type">Tipe:</label>
            <select name="transaction_type" class="form-control" id="transaction_type">
                <option value="Pemasukan" {{ $transaction->transaction_type == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="Pengeluaran" {{ $transaction->transaction_type == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ $transaction->jumlah }}">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $transaction->description }}">
        </div>

        <div class="form-group">
            <label for="date">Tanggal:</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $transaction->date }}">
        </div>

        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" name="category" class="form-control" id="category" value="{{ $transaction->category }}">
        </div>

        <div class="form-group">
            <label for="payment_method">Cara Pembayaran:</label>
            <input type="text" name="payment_method" class="form-control" id="payment_method" value="{{ $transaction->payment_method }}">
        </div>
        <div class="form-group">
            <label for="reference_number">Nomor Referensi:</label>
            <input type="text" name="reference_number" class="form-control" id="reference_number" value="{{ $transaction->reference_number }}">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" name="status" class="form-control" id="status" value="{{ $transaction->status }}">
        </div>

        

        <div class="form-group">
            <button type="submit" class="btn btn-pink">Update</button>
        </div>
    </form>
    </div>
</div>
@endsection
