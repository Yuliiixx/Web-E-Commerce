<!-- resources/views/user.blade.php -->

@extends('layouts.app')

@section('content')


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nohp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 @endsection
