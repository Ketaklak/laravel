<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
{
    if (Session::has('locale')) {
        $locale = Session::get('locale');
        \Log::info('Langue récupérée de la session : ' . $locale);
        App::setLocale($locale);
        \Log::info('Langue après setLocale : ' . App::getLocale());
    } else {
        \Log::info('Aucune langue définie dans la session, langue par défaut : ' . App::getLocale());
    }

    return $next($request);
}


}
