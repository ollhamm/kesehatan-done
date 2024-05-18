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
    Route::get('/manajementpasien/create', [ManajemenPasienController::class, 'create'])->name('mpasient.creatempasient');
    Route::post('/manajementpasien/store', [ManajemenPasienController::class, 'store'])->name('mpasient.storempasient');
    Route::get('/manajementpasien/{id}/edit', [ManajemenPasienController::class, 'edit'])->name('mpasient.editmpasient');
    Route::put('/manajementpasien/{id}/', [ManajemenPasienController::class, 'update'])->name('mpasient.updatempasient');
    Route::delete('/manajementpasien/{id}/destroy', [ManajemenPasienController::class, 'destroy'])->name('mpasient.destroympasient');
    Route::get('/patient/details/{id_pasien}', [ManajemenPasienController::class, 'showPatientDetailsAndPemeriksaan'])->name('patient.details.pemeriksaan');


    // Pemeriksaan
    Route::get('/patient/pemeriksaan', [PemeriksaanController::class, 'showPemeriksaanForm'])->name('pemeriksaan');
    Route::get('/patient/pemeriksaan/create', [PemeriksaanController::class, 'create'])->name('pemeriksaan.create');
    Route::post('/patient/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
    Route::get('/pemeriksaan/{id}/edit', [PemeriksaanController::class, 'edit'])->name('pemeriksaan.edit');
    Route::put('/pemeriksaan/{id}/update', [PemeriksaanController::class, 'update'])->name('pemeriksaan.update');
    Route::delete('/pemeriksaan/{id}/destroy', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');
    Route::get('/pemeriksaan/{id}/details', [PemeriksaanController::class, 'showPemeriksaanDetails'])->name('pemeriksaan.details');

    // Reagensia
    Route::get('/reagensia', [ReagensiaController::class, 'showReagensiaForm'])->name('reagensia');
    Route::get('/reagensia/create', [ReagensiaController::class, 'create'])->name('reagensia.create');
    Route::post('/reagensia/store', [ReagensiaController::class, 'store'])->name('reagensia.store');
    Route::get('/reagensia/{id}/edit', [ReagensiaController::class, 'edit'])->name('reagensia.edit');
    Route::put('/reagensia/{id}/update', [ReagensiaController::class, 'update'])->name('reagensia.update');
    Route::delete('/reagensia/{id}/destroy', [ReagensiaController::class, 'destroy'])->name('reagensia.destroy');
    Route::get('/reagensia/{id}/details', [ReagensiaController::class, 'showReagenDetail'])->name('reagensia.details');

    Route::get('/instrumen', [InstrumenController::class, 'showInstrumenForm'])->name('instrumen');
    Route::get('/instrumen/create', [InstrumenController::class, 'create'])->name('instrumen.create');
    Route::post('/instrumen/store', [InstrumenController::class, 'store'])->name('instrumen.store');
    Route::get('/instrumen/{id}/edit', [InstrumenController::class, 'edit'])->name('instrumen.edit');
    Route::put('/instrumen/{id}/update', [InstrumenController::class, 'update'])->name('instrumen.update');
    Route::delete('/instrumen/{id}/destroy', [InstrumenController::class, 'destroy'])->name('instrumen.destroy');
    Route::get('/instrumen/{id}/details', [InstrumenController::class, 'showInstrumenDetail'])->name('instrumen.details');

    // kunjungan Labolaturium
    Route::get('/kunjungan-labolaturium', [KunjunganLabolaturiumController::class, 'showKunjunganForm'])->name('kunjunganLabolaturium');
    Route::get('/kunjungan-labolaturium/create', [KunjunganLabolaturiumController::class, 'create'])->name('kunjunganLabolaturium.create');
    Route::post('/kunjungan-labolaturium/store', [KunjunganLabolaturiumController::class, 'store'])->name('kunjunganLabolaturium.store');
    Route::get('/kunjungan-labolaturium/{id}/edit', [KunjunganLabolaturiumController::class, 'edit'])->name('kunjunganLabolaturium.edit');
    Route::put('/kunjungan-labolaturium/{id}/update', [KunjunganLabolaturiumController::class, 'update'])->name('kunjunganLabolaturium.update');
    Route::delete('/kunjungan-labolaturium/{id}/destroy', [KunjunganLabolaturiumController::class, 'destroy'])->name('kunjunganLabolaturium.destroy');
    Route::get('/kunjungan-labolaturium/{id}/details', [KunjunganLabolaturiumController::class, 'showKunjunganDetail'])->name('kunjunganLabolaturium.details');

});


// Route untuk logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

