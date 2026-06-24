<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\Claim;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $recentItems = LostItem::where('status', 'available')
            ->latest()
            ->take(6)
            ->get();
        
        $myClaims = Claim::where('user_id', $user->id)
            ->with(['item', 'reviewer'])
            ->latest()
            ->take(5)
            ->get();
        
        $stats = [
            'total_items' => LostItem::where('status', 'available')->count(),
            'my_claims' => Claim::where('user_id', $user->id)->count(),
            'pending_claims' => Claim::where('user_id', $user->id)->where('status', 'pending')->count(),
            'approved_claims' => Claim::where('user_id', $user->id)->where('status', 'approved')->count(),
        ];
        
        return view('dashboard', compact('recentItems', 'myClaims', 'stats'));
    }
}
