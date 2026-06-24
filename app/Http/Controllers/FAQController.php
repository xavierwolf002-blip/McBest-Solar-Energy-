<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function index()
    {
        return FAQ::where('is_active', true)->orderBy('display_order')->get();
    }
}
