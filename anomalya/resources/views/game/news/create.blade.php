@extends('layouts.game')

@section('title', 'Créer une Nouvelle')

@section('content')
<div class="container mt-5">
    <div class="news-form-container"> <!-- Nouvelle classe pour le conteneur du formulaire -->
        <h1>Créer une Nouvelle</h1>
        <form method="POST" action="{{ route('news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" placeholder="Entrez le titre" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea class="form-control" name="content" rows="5" placeholder="Entrez le contenu" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
</div>
@endsection
