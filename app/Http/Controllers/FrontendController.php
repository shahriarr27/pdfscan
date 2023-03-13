<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class FrontendController extends Controller
{
    public function home() {
        return view('frontend.pages.index');
    }

    public function checkout() {
      return view('frontend.pages.checkout');
    }

    public function change_language(Request $request, $lang) {

        if(array_key_exists($lang, Config::get('languages'))) {
          session(['language' => $lang]);
        }

        return redirect()->back();
    }
    
}
