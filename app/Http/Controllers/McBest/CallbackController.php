<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestCallback;
use App\Mail\McBestCallbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller
{
    public function request(Request $request)
    {
        // Rate limiting
        $key = 'callback:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many callback requests. Please try again later.',
            ], 429);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'regex:/^(\+234|0)[7-9][0-1][0-9]{8}$/'],
            'name' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'preferred_time' => 'nullable|string|max:255',
        ], [
            'phone.regex' => 'Please enter a valid Nigerian phone number',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $callback = McBestCallback::create([
                'phone' => $request->phone,
                'name' => $request->name,
                'organization' => $request->organization,
                'preferred_time' => $request->preferred_time,
                'status' => 'pending',
            ]);

            RateLimiter::hit($key, 600); // 10 minutes

            // Send email notification to admin
            $adminEmail = config('mail.from.address', 'info@mcbest.com.ng');
            try {
                Mail::to($adminEmail)->queue(new McBestCallbackMail($callback));
            } catch (\Exception $e) {
                \Log::error('Failed to send callback email: ' . $e->getMessage());
                // Continue even if email fails
            }

            return response()->json([
                'success' => true,
                'message' => 'Callback request received! We will call you back within 2 hours.',
            ]);

        } catch (\Exception $e) {
            \Log::error('Callback request error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please call us directly at +234 706 782 3798',
            ], 500);
        }
    }
}
