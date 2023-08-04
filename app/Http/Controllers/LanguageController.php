<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (in_array($lang, config('locales'))) {
            session()->put('app.locale', $lang);
        }

        return redirect()->back();
    }
}
