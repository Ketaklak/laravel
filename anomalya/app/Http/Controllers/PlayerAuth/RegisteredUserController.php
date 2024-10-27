<?php

namespace App\Http\Controllers\PlayerAuth;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('player.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:players',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $player = Player::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth('player')->login($player);

        return redirect()->route('game.index');
    }
}
