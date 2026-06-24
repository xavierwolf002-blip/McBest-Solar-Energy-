<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:100|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $validated['email'],
            'is_active' => true,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }
}
