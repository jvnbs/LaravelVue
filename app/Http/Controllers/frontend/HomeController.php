<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Banner;
use Illuminate\Support\Facades\Log;

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
public function getProduct()
{
    try {
        $products = Product::where('is_deleted', 0)->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => 200,
                'msg' => 'No products available',
                'results' => []
            ]);
        }

        return response()->json([
            'status' => 200,
            'msg' => 'Products retrieved successfully',
            'results' => $products
        ]);
    } catch (\Exception $e) {
        Log::error('Error fetching products: ' . $e->getMessage());

        return response()->json([
            'status' => 500,
            'msg' => 'Failed to retrieve products. Please try again later.'
        ], 500);
    }
}



public function getCategory()
{
    try {
        $category = Category::where('parent_id', null)->get();

        if ($category->isEmpty()) {
            return response()->json([
                'status' => 200,
                'msg' => 'No category available',
                'results' => []
            ]);
        }

        return response()->json([
            'status' => 200,
            'msg' => 'category retrieved successfully',
            'results' => $category
        ]);
    } catch (\Exception $e) {
        Log::error('Error fetching category: ' . $e->getMessage());

        return response()->json([
            'status' => 500,
            'msg' => 'Failed to retrieve category. Please try again later.'
        ], 500);
    }
}

    


}