<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(app()->environment() == 'production' && \Session::get('locale') != '' && \Session::get('locale') != null){
            session(['locale' => \Session::get('locale')]);
            $locale = session('locale', \Session::get('locale'));
            App::setLocale($locale);
            Carbon::setLocale($locale);
        }

        return $next($request);
    }
}
