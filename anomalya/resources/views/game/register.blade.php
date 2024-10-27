@extends('layouts.game')

@section('title', __('register_page.title'))

@section('content')
<div class="registration-container">
    <h1>{{ __('register_page.heading') }}</h1>
    <p>{{ __('register_page.prompt') }}</p>
    <form method="POST" action="{{ route('game.register') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('register_page.name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __('register_page.name_placeholder') }}" required>
        </div>
        <div class="form-group">
            <label for="email">{{ __('register_page.email') }}</label>
            <input type="email" class="form-control" name="email" placeholder="{{ __('register_page.email_placeholder') }}" required>
        </div>
        <div class="form-group">
            <label for="password">{{ __('register_page.password') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ __('register_page.password_placeholder') }}" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">{{ __('register_page.password_confirmation') }}</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('register_page.password_confirmation_placeholder') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('register_page.register_button') }}</button>
    </form>
</div>
@endsection
