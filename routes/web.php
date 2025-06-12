<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Ubah dashboard agar redirect ke barang.index
Route::get('/dashboard', function () {
    return redirect()->route('barang.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route barang & profile harus login dulu
Route::middleware(['auth'])->group(function () {
    // Route untuk profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✅ Tambahkan route resource untuk barang
    Route::resource('barang', BarangController::class);

    // ✅ Tambahkan route export PDF
    Route::get('/barang/export/pdf', [BarangController::class, 'exportPDF'])->name('barang.exportPDF');
});

require __DIR__.'/auth.php';

