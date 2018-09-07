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
        session(['locale' => $lang]);
        return \Redirect::back();
    }
}
