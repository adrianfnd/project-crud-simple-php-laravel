<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth Route
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/show-buku-{id}', [BukuController::class, 'show'])->name('show-buku');
    Route::get('/create-buku', [BukuController::class, 'create'])->name('create-buku');
    Route::post('/store-buku', [BukuController::class, 'store'])->name('store-buku');
    Route::get('/edit-buku-{id}', [BukuController::class, 'edit'])->name('edit-buku');
    Route::put('/update-buku-{id}', [BukuController::class, 'update'])->name('update-buku');
    Route::delete('/delete-buku-{id}', [BukuController::class, 'destroy'])->name('delete-buku');
});;