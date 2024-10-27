@extends('layouts.game')

@section('content')
<div class="dashboard-container">
    <h1 class="dashboard-title">Dashboard du Jeu Médiéval</h1>
    <p class="welcome-message">Bienvenue, {{ auth()->guard('player')->user()->name }} !</p>
    <p>Gérez vos ressources, développez votre royaume, et menez vos armées à la victoire !</p> 
</div>
@endsection
