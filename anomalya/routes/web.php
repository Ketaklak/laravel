<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameAuthController;
use App\Http\Controllers\NewsController; // Assurez-vous d'importer le NewsController
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Routes pour l'intranet
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('game/login', [GameAuthController::class, 'showLoginForm'])->name('game.login');
    Route::post('game/login', [GameAuthController::class, 'login']);
    Route::post('locale', function (Request $request) {
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'fr'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
        return redirect()->back();
    })->name('locale.change');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // Authentification pour l'intranet

// Routes pour le jeu
Route::prefix('game')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('game.index');
    
    // Routes pour l'authentification du jeu (register, login, etc.)
    Route::get('register', [GameAuthController::class, 'showRegisterForm'])->name('game.register');
    Route::post('register', [GameAuthController::class, 'register']);
    Route::get('login', [GameAuthController::class, 'showLoginForm'])->name('game.login');
    Route::post('login', [GameAuthController::class, 'login']);
    Route::post('logout', [GameAuthController::class, 'logout'])->name('game.logout');
    Route::delete('account', [GameAuthController::class, 'deleteAccount'])->name('game.deleteAccount');
    
    // Routes pour les nouvelles
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news.index'); // Afficher les nouvelles
        Route::get('/create', [NewsController::class, 'create'])->name('news.create'); // Formulaire de création
        Route::post('/', [NewsController::class, 'store'])->name('news.store'); // Enregistrer une nouvelle
    });
});

Route::middleware('auth:player')->group(function () {
    Route::get('/game/dashboard', [GameController::class, 'dashboard'])->name('game.dashboard');
});

// Route de test pour changer la langue
Route::get('set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
});
