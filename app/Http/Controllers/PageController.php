<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Review;

class PageController extends Controller
{
    public function home()
    {
        $featuredProjects = Project::where('featured', true)->orderBy('display_order')->take(3)->get();
        $reviews = Review::where('is_featured', true)->where('is_approved', true)->latest()->take(3)->get();
        
        return view('welcome', compact('featuredProjects', 'reviews'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        $faqs = \App\Models\FAQ::where('is_active', true)->orderBy('display_order')->get();
        return view('pages.faq', compact('faqs'));
    }
}
