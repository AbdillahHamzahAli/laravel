<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IpkController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/mahasiswa/{nrp}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/agent/{tema?}', [AgentController::class, 'show'])->name('agent.show');

Route::get('/hitung-ipk/{ipk1}/{ipk2}', [IpkController::class, 'hitung'])->name('ipk.hitung');

Route::fallback(FallbackController::class);
