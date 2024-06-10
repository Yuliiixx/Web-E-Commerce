@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Transaction Details</h2>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Transaction Information</strong>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Tipe:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->transaction_type }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Jumlah:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->jumlah }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Deskripsi:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->description }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Tanggal:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->date }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Kategori:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->category }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Cara Pembayaran:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->payment_method }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Nomor Rekening:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->reference_number }}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-3">
                    <strong>Status:</strong>
                </div>
                <div class="col-sm-9">
                    {{ $transaction->status }}
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
