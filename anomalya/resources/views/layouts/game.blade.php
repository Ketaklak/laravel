<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('custom_messages.game_title'))</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand" href="{{ route('game.index') }}">{{ __('custom_messages.game_title') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                @guest('player')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('game.index') }}">{{ __('custom_messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('game.login') }}">{{ __('custom_messages.login_title') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('game.register') }}">{{ __('custom_messages.register_title') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ auth()->guard('player')->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('game.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('custom_messages.logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('game.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>

            @auth('player')
                <div class="resource-box d-flex justify-content-center align-items-center">
                    <p class="m-0">{{ __('custom_messages.resources') }}:</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.wood') }}: {{ $resources->wood ?? 0 }}</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.stone') }}: {{ $resources->stone ?? 0 }}</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.food') }}: {{ $resources->food ?? 0 }}</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.gold') }}: {{ $resources->gold ?? 0 }}</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.level') }}: {{ auth()->guard('player')->user()->level ?? 0 }}</p>
                    <p class="m-0 ml-2">{{ __('custom_messages.experience') }}: {{ auth()->guard('player')->user()->experience ?? 0 }}</p>
                </div>
            @endauth

            <!-- Sélecteur de langue -->
            <form action="{{ route('locale.change') }}" method="POST" class="form-inline ml-3">
                @csrf
                <select name="locale" class="form-control" onchange="this.form.submit()">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                </select>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
