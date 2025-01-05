<?php

use App\Http\Controllers\Bibliothecaire\BibliothecaireController;
use App\Http\Controllers\Bibliothecaire\LivreController;
use App\Http\Controllers\Bibliothecaire\ReservationController;
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
    // dashboard
    route::get('/dashboard',[EtudiantController::class,'index'])->name('dashboard');

    // livres
    route::get('/livres',[\App\Http\Controllers\Etudiant\LivreController::class,'index'])->name('etudiant.livre.index');

    // reservations
    Route::post('/livres/{id}/reserver', [\App\Http\Controllers\Etudiant\ReservationController::class, 'store'])->name('etudiant.reservations.store');
    Route::get('/reservations', [\App\Http\Controllers\Etudiant\ReservationController::class, 'index'])->name('etudiant.reservations.index');
    Route::put('/reservations/{id}/return', [\App\Http\Controllers\Etudiant\ReservationController::class, 'return'])->name('etudiant.reservations.return');
    Route::delete('/reservations/{id}', [\App\Http\Controllers\Etudiant\ReservationController::class, 'destroy'])->name('etudiant.reservations.destroy');
});


// Bibliothecaire routes
Route::middleware(['auth', 'BibliothecaireMiddleware'])->group(function () {
    // dashboard
    route::get('/bibliothecaire/dashboard',[BibliothecaireController::class,'index'])->name('bibliothecaire.dashboard');

    // livres route
    route::get('/bibliothecaire/livres',[LivreController::class,'index'])->name('bibliothecaire.livre.index');
    route::get('/bibliothecaire/livres/create',[LivreController::class,'create'])->name('bibliothecaire.livre.create');
    route::post('/bibliothecaire/livres',[LivreController::class,'store'])->name('bibliothecaire.livre.store');
    route::get('/bibliothecaire/livres/{id}',[LivreController::class,'edit'])->name('bibliothecaire.livre.edit');
    route::put('/bibliothecaire/livres/{id}',[LivreController::class,'update'])->name('bibliothecaire.livre.update');
    route::delete('/bibliothecaire/livres/{id}',[LivreController::class,'destroy'])->name('bibliothecaire.livre.destroy');

    // reservations route
    Route::get('/bibliothecaire/reservations', [ReservationController::class, 'index'])->name('bibliothecaire.reservations.index');
    Route::put('/bibliothecaire/reservations/{id}/status', [ReservationController::class, 'updateStatus'])->name('bibliothecaire.reservations.updateStatus');
    Route::get('/bibliothecaire/reservations/{id}', [ReservationController::class, 'show'])->name('bibliothecaire.reservations.show');

});

require __DIR__.'/auth.php';
