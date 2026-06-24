<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('display_order')->paginate(12);
        return view('pages.portfolio', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('pages.portfolio_show', compact('project'));
    }

    public function featured()
    {
        return Project::where('featured', true)->get();
    }
}
