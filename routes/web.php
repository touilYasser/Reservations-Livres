<?php

use App\Http\Controllers\Bibliothecaire\BibliothecaireController;
use App\Http\Controllers\Bibliothecaire\LivreController;
use App\Http\Controllers\Etudiant\EtudiantController;
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
});

// Etudiant routes
Route::middleware(['auth', 'EtudiantMiddleware'])->group(function () {
    route::get('/dashboard',[EtudiantController::class,'index'])->name('dashboard');
});


// Bibliothecaire routes
Route::middleware(['auth', 'BibliothecaireMiddleware'])->group(function () {
    route::get('/bibliothecaire/dashboard',[BibliothecaireController::class,'index'])->name('bibliothecaire.dashboard');

    // livres route
    route::get('/bibliothecaire/livres',[LivreController::class,'index'])->name('bibliothecaire.livre.index');
    route::get('/bibliothecaire/livres/create',[LivreController::class,'create'])->name('bibliothecaire.livre.create');
    route::post('/bibliothecaire/livres',[LivreController::class,'store'])->name('bibliothecaire.livre.store');
    route::get('/bibliothecaire/livres/{id}',[LivreController::class,'edit'])->name('bibliothecaire.livre.edit');
    route::put('/bibliothecaire/livres/{id}',[LivreController::class,'update'])->name('bibliothecaire.livre.update');
    route::delete('/bibliothecaire/livres/{id}',[LivreController::class,'destroy'])->name('bibliothecaire.livre.destroy');
});

require __DIR__.'/auth.php';
