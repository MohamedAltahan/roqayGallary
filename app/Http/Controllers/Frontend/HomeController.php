<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\HomePageSetting;

class HomeController extends Controller
{
    public function index()
    {
        $homePageSetting = HomePageSetting::first();
        $categories = Category::with('design')->get();

        return view('frontend.pages.home', compact('homePageSetting', 'categories'));
    }

    public function about()
    {
        $about = About::first();

        return view('frontend.pages.about', compact('about'));
    }
}
