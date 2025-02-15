<?php

namespace App\Http\Controllers\frontend;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelResource;
use App\Interfaces\HomeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    private HomeRepositoryInterface $HomeRepositoryInterface;
    public function __construct(HomeRepositoryInterface $HomeRepositoryInterface)
    {
        $this->HomeRepositoryInterface = $HomeRepositoryInterface;
    }

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


    public function faqs()
    {
        $data = $this->HomeRepositoryInterface->faqs();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Faq retrieved successfully',
            200,
        );
    }


    public function blogs()
    {
        $data = $this->HomeRepositoryInterface->faqs();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Faq retrieved successfully',
            200,
        );
    }


    public function news()
    {
        $data = $this->HomeRepositoryInterface->faqs();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Faq retrieved successfully',
            200,
        );
    }

    public function categories()
    {
        $data = $this->HomeRepositoryInterface->categories();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Category retrieved successfully',
            200,
        );
    }

    public function products()
    {
        $data = $this->HomeRepositoryInterface->products();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Products retrieved successfully',
            200,
        );
    }


}