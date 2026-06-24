<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::where('is_active', true)->orderBy('display_order')->get();
        return view('pages.team', compact('team'));
    }
}
