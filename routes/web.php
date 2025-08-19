<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Models\Event;

// Route pour la page d'accueil
Route::get('/', function () {
    // Récupérer les événements en vedette pour la page d'accueil
    $events = Event::featured()
        ->upcoming()
        ->orderBy('date', 'asc')
        ->limit(3)
        ->get();
        
    return view('welcome', compact('events'));
});

Route::get('/event', function () {
    return view('event');
});

// Route pour la page "À propos"
Route::get('/about', function () {
    return view('about');
});

// Route pour la page des services
Route::get('/services', function () {
    return view('services');
});

// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Password reset routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route protégée pour le dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Routes pour les événements
Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
