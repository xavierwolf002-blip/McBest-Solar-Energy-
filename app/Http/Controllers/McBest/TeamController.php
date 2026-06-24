<?php

namespace App\Http\Controllers\McBest;

use App\Http\Controllers\Controller;
use App\Models\McBestTeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = McBestTeamMember::active()->ordered()->get();

        return response()->json([
            'success' => true,
            'team' => $teamMembers,
        ]);
    }
}
