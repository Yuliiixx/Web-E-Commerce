@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">Tambah User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <form action="{{ route('user.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" id="fullname" class="form-control" value="{{ old('fullname') }}" required>
                <div class="invalid-feedback">
                    Please provide a fullname.
                </div>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
                <div class="invalid-feedback">
                    Please provide a username.
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                <div class="invalid-feedback">
                    Please provide a valid email address.
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please provide a password.
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                <div class="invalid-feedback">
                    Please confirm your password.
                </div>
            </div>
            <div class="form-group">
                <label for="nohp">No HP:</label>
                <input type="text" name="nohp" id="nohp" class="form-control" value="{{ old('nohp') }}" required>
                <div class="invalid-feedback">
                    Please provide a phone number.
                </div>
            </div>
            <button type="submit" class="btn btn-pink">Simpan</button>
        </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection
