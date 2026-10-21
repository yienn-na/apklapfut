<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/aksilogin', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tambahan Route untuk Menu Navigasi Futsal (HTML Polos)
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/lapangan', [AuthController::class, 'lapangan']);

Route::get('/booking', [AuthController::class, 'booking']);

Route::get('/pembayaran', [AuthController::class, 'pembayaran']);
Route::post('/booking/proses', [AuthController::class, 'storeBooking']);
Route::get('/pembayaran/proses/{id}', [AuthController::class, 'prosesPembayaran']);
Route::get('/riwayat', [AuthController::class, 'riwayat']);