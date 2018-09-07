<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-09-07
 * Time: 17:02
 */

namespace App\Http\Controllers;

class ChangeLanguageController
{
    public function switchLang($lang){
        if (array_key_exists($lang, config('app.locales'))) {
            App::setLocale($lang);
            Carbon::setLocale($lang);
        }
        return Redirect::back();
    }
}
