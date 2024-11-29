<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Design;
use App\Models\HomePageSetting;
use App\Models\Setting;
use App\Models\Social;

class HomeController extends Controller
{
    public function index()
    {
        $homePageHeader = HomePageSetting::where(['name' => 'header', 'group' => 'home_page_settings'])->value('payload');
        $designs = Design::where('status', 'active')->get();

        return view('frontend.pages.home', compact('homePageHeader', 'designs'));
    }

    public function about()
    {
        $about = About::first();
        $setting = Setting::first();
        return view('frontend.pages.about', compact('about', 'setting'));
    }
}
