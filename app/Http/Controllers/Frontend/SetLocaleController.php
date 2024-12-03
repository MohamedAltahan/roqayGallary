<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class SetLocaleController extends Controller
{
    public function __invoke($locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
