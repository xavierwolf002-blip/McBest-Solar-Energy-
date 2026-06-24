<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Rate limiting: 5 requests per 15 minutes per IP
        $key = 'contact-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'message' => "Too many requests. Please try again in {$seconds} seconds.",
            ], 429);
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => ['required', 'regex:/^(\+234|0)[7-9][0-1][0-9]{8}$/'],
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'phone.regex' => 'Please enter a valid Nigerian phone number (e.g., 08012345678 or +2348012345678)',
            'email.email' => 'Please enter a valid email address',
            'message.min' => 'Please provide at least 10 characters describing your needs',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Store lead in database
        try {
            $lead = McBestLead::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service' => $request->service ?? 'General Inquiry',
                'message' => $request->message,
                'source' => 'website',
                'status' => 'new',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Increment rate limiter
            RateLimiter::hit($key, 900); // 15 minutes

            // TODO: Queue email notification to admin
            // TODO: Queue WhatsApp notification

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you within 24 hours.',
                'lead_id' => $lead->id,
            ]);

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again or call us directly at +234 706 782 3798',
            ], 500);
        }
    }
}
