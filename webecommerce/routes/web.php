<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('kategori', KategoriController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('produk', ProdukController::class);


Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');



use App\Http\Controllers\AuthController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


