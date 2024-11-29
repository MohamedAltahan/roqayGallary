<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EmailInbox;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('frontend.pages.contact', compact('setting'));
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'max:100|email',
            'message' => 'required|max:1000',
            'phone' => 'required|max:30',
        ]);

        EmailInbox::create($validData);

        toastr(__('Sent successfully'));

        return redirect()->back();
    }
}
