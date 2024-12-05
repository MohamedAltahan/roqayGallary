<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)->get();

        return view('frontend.pages.services', compact('services'));
    }
}
