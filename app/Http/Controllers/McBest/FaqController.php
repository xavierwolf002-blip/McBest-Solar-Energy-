<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestFaq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = McBestFaq::active()->ordered();

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->category($request->category);
        }

        $faqs = $query->get();
        $categories = McBestFaq::active()->distinct()->pluck('category');

        return response()->json([
            'success' => true,
            'faqs' => $faqs,
            'categories' => $categories,
        ]);
    }
}
