@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Total Transactions</h2>
    
    <div class="d-flex justify-content-end mb-4">
        <button class="btn btn-primary" data-toggle="modal" data-target="#transactionModal">Lihat Transaksi</button>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-header">Total Pemasukan dari Orders</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. {{ number_format($totalPemasukanOrders, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-header">Total Pemasukan Lainnya</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. {{ number_format($totalPemasukanTransactions, 2) }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-header">Total Pengeluaran</div>
                <div class="card-body">
                    <h5 class="card-title">Rp. {{ number_format($totalPengeluaran, 2) }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Pilih Jenis Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{ route('transactions.pemasukan') }}" class="btn btn-success btn-block">Lihat Transaksi Pemasukan</a>
                    <a href="{{ route('transactions.pengeluaran') }}" class="btn btn-danger btn-block">Lihat Transaksi Pengeluaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
