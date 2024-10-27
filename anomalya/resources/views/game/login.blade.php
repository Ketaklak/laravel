@extends('layouts.game')

@section('title', __('custom_messages.login_title'))

@section('content')
<div class="login-container">
    <h1>{{ __('custom_messages.login_title') }}</h1>
    <p>{{ __('custom_messages.login_prompt') }}</p>
    <form method="POST" action="{{ route('game.login') }}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="{{ __('custom_messages.email_placeholder') }}" required class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="{{ __('custom_messages.password_placeholder') }}" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('custom_messages.login_title') }}</button>
        <p class="mt-2">{{ __('custom_messages.no_account') }} <a href="{{ route('game.register') }}">{{ __('custom_messages.register_title') }}</a></p>
    </form>
</div>
@endsection
