<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Models\Event;

// Route pour la page d'accueil
// Route pour la page d'accueil
// Route pour la page d\'accueil
Route::get('/', function () {
    // Récupérer des événements à venir (tolère l\'absence de DB en prod serverless)
    try {
        $events = Event::upcoming()
            ->orderBy('date', 'asc')
            ->limit(3)
            ->get();
    } catch (\Throwable $e) {
        $events = collect();
    }

    return view('welcome', compact('events'));
});

Route::get('/event', function () {
    return view('event');
});

// Route pour la page "Ã€ propos"
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

// Route protÃ©gÃ©e pour le dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Route protÃ©gÃ©e pour la page profil
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');

// Routes de mise Ã  jour du profil (protÃ©gÃ©es)
Route::put('/profile', [AuthController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::put('/profile/password', [AuthController::class, 'updatePassword'])->middleware('auth')->name('profile.password');
Route::put('/profile/theme', [AuthController::class, 'updateTheme'])->middleware('auth')->name('profile.theme');

// Routes Dashboard: gestion des Ã©vÃ©nements de l'utilisateur connectÃ©
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/events', [EventController::class, 'myIndex'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Nouvelles pages simples du dashboard
    Route::get('/reservations', [ReservationController::class, 'myIndex'])->name('reservations');
    Route::get('/favoris', [FavoriteController::class, 'index'])->name('favorites');
    Route::get('/historique', fn () => view('dashboard.history'))->name('history');
    Route::get('/paiements', [PaymentController::class, 'dashboard'])->name('payments');
    Route::get('/parametres', fn () => view('dashboard.settings'))->name('settings');

    // Paiements - Initiation (protÃ©gÃ©)
    Route::post('/payments/moov/initiate', [PaymentController::class, 'initiateMoov'])->name('payments.moov.initiate');
    Route::post('/payments/mixx/initiate', [PaymentController::class, 'initiateMixx'])->name('payments.mixx.initiate');

    // Favoris - actions
    Route::post('/favorites/{event}', [FavoriteController::class, 'store'])->name('favorites.add');
    Route::delete('/favorites/{event}', [FavoriteController::class, 'destroy'])->name('favorites.remove');
});

// Paiements - Webhooks (publics, sÃ©curiser via signature/token)
Route::post('/webhooks/moov', [PaymentController::class, 'moovCallback'])->name('webhooks.moov');
Route::post('/webhooks/mixx', [PaymentController::class, 'mixxCallback'])->name('webhooks.mixx');

// Routes pour les Ã©vÃ©nements (public)
Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('event.show');
