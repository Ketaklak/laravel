<?php

namespace App\Http\Controllers;

use App\Models\News; // Assurez-vous d'importer le modèle News
use App\Models\Resource; // Assurez-vous d'importer le modèle Resource
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index()
    {
        // Récupérer les 5 dernières nouvelles
        $news = News::latest()->take(5)->get();

        // Appliquer la langue si elle est stockée dans la session
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        // Retourner la vue de la page d'accueil du jeu avec les nouvelles
        return view('game.index', compact('news'));
    }

    public function dashboard()
    {
        // Récupérer l'utilisateur connecté
        $player = auth()->guard('player')->user();

        // Récupérer les ressources du joueur
        $resources = Resource::where('player_id', $player->id)->first();

        // Appliquer la langue si elle est stockée dans la session
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        // Retourner la vue du tableau de bord avec les ressources
        return view('game.dashboard', compact('resources'));
    }
}
