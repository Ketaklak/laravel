<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous que le modèle User est importé

class IntranetController extends Controller
{
    // Afficher la page d'accueil de l'intranet
    public function index()
    {
        return view('intranet.index');
    }

    // Afficher la liste des utilisateurs
    public function listUsers()
    {
        $users = User::all();
        return view('intranet.users', compact('users'));
    }
}

