<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/clientes',[ClientController::class, 'index'])->name('clientes');
    Route::get('/crear',[ClientController::class, 'create'])->name('clients.create');
    Route::post('/guardar',[ClientController::class, 'store'])->name('clients.store');
    Route::get('/cliente/show/{client}',[ClientController::class, 'show'])->name('clients.show');
    Route::get('/cliente/edit/{client}',[ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/cliente/{client}',[ClientController::class, 'destroy'])->name('clients.destroy');




});

require __DIR__.'/auth.php';
