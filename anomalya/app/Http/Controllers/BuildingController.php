<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $player = auth()->guard('player')->user();

        // Récupérer les bâtiments du joueur
        $buildings = Building::where('player_id', $player->id)->get();

        return view('game.buildings.index', compact('buildings'));
    }

    public function create()
    {
        return view('game.buildings.create');
    }

    public function store(Request $request)
    {
        $player = auth()->guard('player')->user();

        $request->validate([
            'type' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'production_rate' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:0',
        ]);

        // Créer un nouveau bâtiment pour le joueur connecté
        Building::create([
            'player_id' => $player->id,
            'type' => $request->type,
            'level' => $request->level,
            'production_rate' => $request->production_rate,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('game.buildings.index')->with('success', 'Bâtiment créé avec succès.');
    }
}
