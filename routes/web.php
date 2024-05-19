<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\ManajemenPasienController;
use App\Http\Controllers\Auth\PemeriksaanController;
use App\Http\Controllers\Auth\ReagensiaController;
use App\Http\Controllers\Auth\InstrumenController;
use App\Http\Controllers\Auth\KunjunganLabolaturiumController;


Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);


Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AdminController::class, 'register']);

// route penting
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AdminController::class, 'showHomeForm'])->name('home');
    Route::get('/', [ManajemenPasienController::class, 'showHomeForm'])->name('home');
    Route::get('/manajementpasien', [ManajemenPasienController::class, 'showManajementForm'])->name('mpasient');
    Route::post('/manajementpasien/store', [ManajemenPasienController::class, 'store'])->name('mpasient.store');
    Route::get('/manajementpasien/{id_pasien}/edit', [ManajemenPasienController::class, 'edit'])->name('mpasient.edit');
    Route::put('/manajementpasien/{id_pasien}', [ManajemenPasienController::class, 'update'])->name('mpasient.update');
    Route::delete('/manajementpasien/{id_pasien}/destroy', [ManajemenPasienController::class, 'destroy'])->name('mpasient.destroy');
    Route::get('/patient/details/{id_pasien}', [ManajemenPasienController::class, 'showPatientDetailsAndPemeriksaan'])->name('patient.details.pemeriksaan');


    // Pemeriksaan
    Route::get('/patient/pemeriksaan', [PemeriksaanController::class, 'showPemeriksaanForm'])->name('pemeriksaan');
    Route::post('/patient/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
    Route::get('/pemeriksaan/{id_periksa}/edit', [PemeriksaanController::class, 'edit'])->name('pemeriksaan.edit');
    Route::put('/pemeriksaan/{id_periksa}', [PemeriksaanController::class, 'update'])->name('pemeriksaan.update');
    Route::delete('/pemeriksaan/{id}/destroy', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');
    Route::get('/pemeriksaan/{id}/details', [PemeriksaanController::class, 'showPemeriksaanDetails'])->name('pemeriksaan.details');

    // Reagensia
    Route::get('/reagensia', [ReagensiaController::class, 'showReagensiaForm'])->name('reagensia');
    Route::post('/reagensia/store', [ReagensiaController::class, 'store'])->name('reagensia.store');
    Route::get('/reagensia/{id}/edit', [ReagensiaController::class, 'edit'])->name('reagensia.edit');
    Route::put('/reagensia/{id}/update', [ReagensiaController::class, 'update'])->name('reagensia.update');
    Route::delete('/reagensia/{id}/destroy', [ReagensiaController::class, 'destroy'])->name('reagensia.destroy');
    Route::get('/reagensia/{id}/details', [ReagensiaController::class, 'showReagenDetail'])->name('reagensia.details');

    // instrumen
    Route::get('/instrumen', [InstrumenController::class, 'showInstrumenForm'])->name('instrumen');
    Route::get('/instrumen/create', [InstrumenController::class, 'create'])->name('instrumen.create');
    Route::post('/instrumen/store', [InstrumenController::class, 'store'])->name('instrumen.store');
    Route::put('/instrumen/{id_instrumen}/update', [InstrumenController::class, 'update'])->name('instrumen.update');
    Route::delete('/instrumen/{id_instrumen}/destroy', [InstrumenController::class, 'destroy'])->name('instrumen.destroy');
    Route::get('/instrumen/{id_instrumen}/details', [InstrumenController::class, 'showInstrumenDetail'])->name('instrumen.details');

    // kunjungan Labolaturium
    Route::get('/kunjungan-labolaturium', [KunjunganLabolaturiumController::class, 'showKunjunganForm'])->name('kunjunganLabolaturium');
    Route::post('/kunjungan-labolaturium/store', [KunjunganLabolaturiumController::class, 'store'])->name('kunjunganLabolaturium.store');
    Route::put('/kunjungan-labolaturium/{id}/update', [KunjunganLabolaturiumController::class, 'update'])->name('kunjunganLabolaturium.update');
    Route::delete('/kunjungan-labolaturium/{id}/destroy', [KunjunganLabolaturiumController::class, 'destroy'])->name('kunjunganLabolaturium.destroy');
    Route::get('/kunjungan-labolaturium/{id}/details', [KunjunganLabolaturiumController::class, 'showKunjunganDetail'])->name('kunjunganLabolaturium.details');

});


// Route untuk logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

