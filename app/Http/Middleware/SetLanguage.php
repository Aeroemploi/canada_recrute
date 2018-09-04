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
        $frHosts = [
            'testsite.test',
        ];

        if(app()->environment() == 'production'){
            if(in_array($_SERVER['HTTP_HOST'], $frHosts)){
                session(['locale' => 'fr']);
                $locale = session('locale', 'fr');
            } else {
                session(['locale' => 'en']);
                $locale = session('locale', 'en');
            }
        } else {
            if ($_SERVER['HTTP_HOST'] == 'testsite.test' || $_SERVER['HTTP_HOST'] == 'codebase.ca') {
                session(['locale' => 'fr']);
                $locale = session('locale', 'fr');
            } else {
                session(['locale' => 'en']);
                $locale = session('locale', 'en');
            }
        }

        App::setLocale($locale);
        Carbon::setLocale($locale);

        return $next($request);
    }
}
