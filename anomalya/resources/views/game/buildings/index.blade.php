@extends('layouts.game')

@section('title', __('messages.Mes Bâtiments'))

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ __('messages.Mes Bâtiments') }}</h1>

        <h2>{{ __('messages.Ressources Disponibles') }}</h2>
        <p>{{ __('messages.Bois') }}: {{ $resources->wood }}</p>
        <p>{{ __('messages.Pierre') }}: {{ $resources->stone }}</p>
        <p>{{ __('messages.Or') }}: {{ $resources->gold }}</p>

        <h2>{{ __('messages.Bâtiments de Récolte') }}</h2>
        @foreach ($resourceBuildings as $key => $info)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ __('buildings.' . $key) }}</h5>
                    <p>{{ __('messages.Coût') }}: {{ __('messages.Bois') }} - {{ $info['cost']['wood'] }}, {{ __('messages.Pierre') }} - {{ $info['cost']['stone'] }}, {{ __('messages.Or') }} - {{ $info['cost']['gold'] }}</p>
                    <p>{{ __('messages.Taux de production') }}: {{ $info['production_rate'] }}</p>
                    <form action="{{ route('game.buildings.build') }}" method="POST">
                        @csrf
                        <input type="hidden" name="building_type" value="{{ $key }}">
                        <input type="hidden" name="category" value="resource_buildings">
                        <button type="submit" class="btn btn-primary">{{ __('messages.Construire') }}</button>
                    </form>
                </div>
            </div>
        @endforeach

        <h2>{{ __('messages.Bâtiments Militaires') }}</h2>
        @foreach ($militaryBuildings as $key => $info)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ __('buildings.' . $key) }}</h5>
                    <p>{{ __('messages.Coût') }}: {{ __('messages.Bois') }} - {{ $info['cost']['wood'] }}, {{ __('messages.Pierre') }} - {{ $info['cost']['stone'] }}, {{ __('messages.Or') }} - {{ $info['cost']['gold'] }}</p>
                    <p>{{ __('messages.Capacité') }}: {{ $info['capacity'] }}</p>
                    <form action="{{ route('game.buildings.build') }}" method="POST">
                        @csrf
                        <input type="hidden" name="building_type" value="{{ $key }}">
                        <input type="hidden" name="category" value="military_buildings">
                        <button type="submit" class="btn btn-primary">{{ __('messages.Construire') }}</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
