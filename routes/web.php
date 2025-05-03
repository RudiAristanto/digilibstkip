<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UploadMandiriController;
use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\FDocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::get('/', [FDocumentController::class, 'index'])->name('homepage');
Route::get('/detail/{document}', [FDocumentController::class, 'detail_document'])->name('detail-dokumen');

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::resource('kategori', KategoriController::class);
    Route::resource('writer', WriterController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota']);
});

//route auth
Route::get('/login', [AuthManualController::class, 'index'])->name('login');
Route::post('/login', [AuthManualController::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManualController::class, 'logout'])->name('logout');

// Route admin
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Route user
Route::middleware(['auth', 'checkrole:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

//route test
Route::get('/tes', function(){
    return view('test');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/upload-mandiri', [UploadMandiriController::class, 'create'])->name('upload-mandiri.create');
    Route::post('/upload-mandiri', [UploadMandiriController::class, 'store'])->name('upload-mandiri.store');
    Route::get('/dokumen-saya', [UploadMandiriController::class, 'myDocuments'])->name('dokumen.saya');
});
