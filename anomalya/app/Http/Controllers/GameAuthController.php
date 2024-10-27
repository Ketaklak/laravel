<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Resource; // Assurez-vous d'importer le modèle Resource
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GameAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('game.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:players',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Créer le joueur
        $player = Player::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ajouter les ressources par défaut au joueur
        Resource::create([
            'player_id' => $player->id,
            'wood' => 500,
            'stone' => 500,
            'food' => 1000,
            'gold' => 250,
        ]);

        return redirect()->route('game.login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
{
    // Définir la langue de l'application à partir de la session
    $locale = session('locale', 'fr'); // Utilise 'fr' comme langue par défaut
    app()->setLocale($locale);

    return view('game.login');
}

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('player')->attempt($credentials)) {
            return redirect()->route('game.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('player')->logout();
        return redirect()->route('game.login');
    }

    public function deleteAccount()
    {
        $player = Auth::guard('player')->user();
        $player->delete();

        return redirect()->route('game.register')->with('success', 'Account deleted successfully.');
    }
}
