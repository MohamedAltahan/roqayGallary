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
        $homePageHeader = HomePageSetting::where(['name' => 'header', 'group' => 'home_page_settings'])->value('payload');

        $categories = Category::with('design')->where('status', 'active')->get();

        return view('frontend.pages.home', compact('homePageHeader', 'categories'));
    }

    public function about()
    {
        $about = About::first();

        return view('frontend.pages.about', compact('about'));
    }
}
