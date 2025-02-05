<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Banner;

class HomeController extends Controller
{
    public function changeLanguage(Request $request, $lang)
    {
        $defaultLang = "en";
        
        $supportedLanguages = ['en', 'hi', 'ar']; 

        if (in_array($lang, $supportedLanguages)) {
            session()->put('locale', $lang);
            App::setLocale(session('locale'));

        } else {
            session()->put('locale', $defaultLang);
            App::setLocale(session('locale'));
        }

        return redirect()->back();
    }


    public function index()
    {
        $banners = Banner::where('is_active', 1)->first();
        return view('frontend.index', compact('banners'));
    }

    public function services()
    {
        return view('frontend.services');
    }


}