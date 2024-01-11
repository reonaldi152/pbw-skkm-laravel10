<?php

use App\Http\Controllers\AdminMasterController;
use App\Http\Controllers\AdminPKAController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin_master'])->group(function () {
    // Route untuk Admin Master
    Route::resource('admin-master', AdminMasterController::class);
});

Route::middleware(['auth', 'role:admin_pka'])->group(function () {
    // Route untuk Admin PKA
    // Route::resource('admin-pka', AdminPKAController::class);
    Route::get('/admin-pka', [AdminPKAController::class, 'index'])->name('admin-pka.index');
    Route::get('/admin-pka/create', [AdminPKAController::class, 'create'])->name('admin-pka.create');
    Route::post('/admin-pka/store', [AdminPKAController::class, 'store'])->name('admin-pka.store');
    Route::get('/admin-pka/edit/{id}', [AdminPKAController::class, 'edit'])->name('admin-pka.edit');
    Route::put('/admin-pka/update/{id}', [AdminPKAController::class, 'update'])->name('admin-pka.update');
    Route::delete('/admin-pka/destroy/{id}', [AdminPKAController::class, 'destroy'])->name('admin-pka.destroy');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    // Route untuk Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('kegiatan', KegiatanController::class);
});
