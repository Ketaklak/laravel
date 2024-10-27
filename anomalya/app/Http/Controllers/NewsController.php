<?php

namespace App\Http\Controllers;

use App\Models\News; // Assurez-vous d'importer le modèle News
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Méthode pour afficher la liste des nouvelles
    public function index()
    {
        $news = News::latest()->take(5)->get(); // Récupérer les 5 dernières nouvelles
        return view('game.index', compact('news')); // Passer les nouvelles à la vue
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle
    public function create()
    {
        return view('game.news.create'); // Chemin correct vers la vue
    }

    // Méthode pour stocker une nouvelle dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::create($request->all()); // Créer une nouvelle en utilisant les données validées
        return redirect()->route('game.index')->with('success', 'Nouvelle créée avec succès !');
    }
}
