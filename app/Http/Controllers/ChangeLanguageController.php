<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-09-07
 * Time: 17:02
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ChangeLanguageController extends Controller
{
    public function switchLang($lang){
        if (in_array($lang, \Config::get('app.locales'))) {
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}
