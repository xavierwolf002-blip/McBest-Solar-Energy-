<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Rate limiting
        $key = 'newsletter:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return response()->json([
                'success' => false,
                'message' => 'Too many subscription attempts. Please try again later.',
            ], 429);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns|max:255|unique:mcbest_subscribers,email',
        ], [
            'email.unique' => 'This email is already subscribed to our newsletter.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $subscriber = McBestSubscriber::create([
                'email' => $request->email,
                'is_active' => true,
                'ip_address' => $request->ip(),
            ]);

            RateLimiter::hit($key, 600); // 10 minutes

            // TODO: Queue welcome email

            return response()->json([
                'success' => true,
                'message' => 'Successfully subscribed! Check your email for confirmation.',
            ]);

        } catch (\Exception $e) {
            \Log::error('Newsletter subscription error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.',
            ], 500);
        }
    }

    public function unsubscribe(Request $request, $email)
    {
        $subscriber = McBestSubscriber::where('email', $email)->firstOrFail();
        $subscriber->unsubscribe();

        return view('mcbest.unsubscribe-success', compact('subscriber'));
    }
}
