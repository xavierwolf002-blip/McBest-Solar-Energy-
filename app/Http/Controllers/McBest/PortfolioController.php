<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestProject;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = McBestProject::query()->ordered();

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->category($request->category);
        }

        $projects = $query->paginate(12);

        return view('mcbest.portfolio', compact('projects'));
    }

    public function featured()
    {
        $projects = McBestProject::featured()->ordered()->limit(6)->get();

        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }

    public function show(McBestProject $project)
    {
        return view('mcbest.project-detail', compact('project'));
    }
}
