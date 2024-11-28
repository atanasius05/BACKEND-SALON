<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarberController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RiwayatController;

Route::apiResource('barber', BarberController::class);
Route::apiResource('layanan', LayananController::class);
Route::apiResource('pengguna', PenggunaController::class);
Route::apiResource('pemesanan', PemesananController::class);
Route::apiResource('review', ReviewController::class);
Route::apiResource('riwayat', RiwayatController::class);
