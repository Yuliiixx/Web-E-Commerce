@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Daftar Transaksi Pemasukan</h2>

    <a href="{{ route('transactions.create', ['type' => 'Pemasukan']) }}" class="btn btn-success mb-4">Tambah Transaksi Pemasukan</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemasukanTransactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>Rp. {{ number_format($transaction->jumlah, 2) }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->category }}</td>
                    <td class="text-center">
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?');">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
