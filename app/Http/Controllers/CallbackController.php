<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Callback;

class CallbackController extends Controller
{
    public function request(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'preferred_time' => 'nullable|string|max:50',
        ]);

        Callback::create([
            'phone' => $validated['phone'],
            'preferred_time' => $validated['preferred_time'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Callback requested successfully. We will call you soon!');
    }
}
