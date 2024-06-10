<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\TransactionController;

// Route untuk fitur CRUD kategori
Route::resource('kategori', KategoriController::class)->middleware('auth');

// Route untuk halaman beranda
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route untuk fitur CRUD produk
Route::resource('produk', ProdukController::class)->middleware('auth');

// Route untuk fitur CRUD user
Route::resource('user', UserController::class)->middleware('auth');

// Route untuk fitur CRUD pesanan
Route::resource('pesanan', PesananController::class)->middleware('auth');

// Route untuk fitur CRUD order
Route::resource('orders', OrderController::class)->middleware('auth');

// Route untuk fitur CRUD order details
Route::resource('order-details', OrderDetailController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

// Route untuk generate PDF
Route::get('orders/{id}/pdf', [OrderController::class, 'generatePDF'])->name('orders.generatePDF')->middleware('auth');


Route::resource('favorits', FavoritController::class);



Route::get('/transactions/pemasukan', [TransactionController::class, 'pemasukan'])->name('transactions.pemasukan');
Route::get('/transactions/pengeluaran', [TransactionController::class, 'pengeluaran'])->name('transactions.pengeluaran');
Route::resource('transactions', TransactionController::class);



// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route untuk register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
