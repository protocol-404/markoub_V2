<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavetteController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication required routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // return 'Votre rôle est : ' . Auth::user()->role;
        return view('dashboard');
    })->name('dashboard');

    // Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/users', [AdminController::class, 'getAllUsers'])->name('users');
    Route::put('/user/{id}/update-role', [AdminController::class, 'modifyUserRole'])->name('modifyUserRole');

    // Companies management
    Route::resource('societes', SocieteController::class);
});

// Company routes
Route::middleware(['auth', 'role:societe'])->prefix('societes')->name('societes.')->group(function () {
    Route::resource('navettes', NavetteController::class)->except(['show']);
});

// User routes
Route::middleware(['auth', 'role:user'])->group(function () {
    // Navettes
    Route::controller(UserController::class)->group(function () {
        Route::get('/navettes', 'index')->name('navettes.index');
        Route::get('/navettes/{id}/sabonner', 'sabonner')->name('navettes.sabonner');

        // Subscriptions
        Route::get('/mes-abonnements', 'myAbonnement')->name('abonnements.all');
        Route::delete('/abonnements/{id}/annuler', 'annuler')->name('abonnements.annuler');
    });
});

// Legacy route - consider removing or updating
Route::get('/admin', function () {
    return 'Welcome Admin!';
})->middleware('role:admin');
