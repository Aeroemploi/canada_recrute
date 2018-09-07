<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') AND array_key_exists(Session::get('locale'), Config::get('languages'))) {
            App::setLocale(Session::get('locale'));
        }
        else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale('fr');
        }
        return $next($request);
    }
}
