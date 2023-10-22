<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LangController extends Controller
{
    public function switchLang ($lang) : RedirectResponse
    {
        if( array_key_exists($lang, Config::get('languages')) ) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}
