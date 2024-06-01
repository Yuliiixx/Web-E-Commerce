
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\AuthController;

Route::resource('kategori', KategoriController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('produk', ProdukController::class);


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('user', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::get('user/{id}', [AuthController::class, 'show'])->middleware('auth:sanctum');
Route::put('user/{id}', [AuthController::class, 'update'])->middleware('auth:sanctum');
Route::delete('user/{id}', [AuthController::class, 'destroy'])->middleware('auth:sanctum');
