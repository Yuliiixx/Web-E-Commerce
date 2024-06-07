@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')
    <div class="my-4">
        <h1>Daftar User</h1>
        <a href="{{ route('user.create') }}" class="btn btn-pink mb-3">Tambah User</a>
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($user as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nohp }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@endsection
