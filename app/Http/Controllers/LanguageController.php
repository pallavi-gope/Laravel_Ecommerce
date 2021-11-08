<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class LanguageController extends Controller
{
    public function hindi(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'hindi');
        return Redirect()->back();
    }
    public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return Redirect()->back();
    }
}
