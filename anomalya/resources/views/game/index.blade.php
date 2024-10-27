@extends('layouts.game')

@section('content')
<div class="container mt-5 text-center">
    <div class="welcome-container">
        <h1>{{ __('custom_messages.welcome_title') }}</h1>
        <p>{{ __('custom_messages.welcome_message') }}</p>
    </div>

    <h2>{{ __('custom_messages.news_title') }}</h2>
    <div class="news-container">
        @foreach($news as $item)
            <div class="news-item">
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->content }}</p>
                <small>{{ __('custom_messages.published_on') }} {{ $item->created_at->format('d/m/Y') }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
