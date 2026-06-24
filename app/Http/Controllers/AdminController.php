<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LostItem;
use App\Models\Claim;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_items' => LostItem::count(),
            'available_items' => LostItem::where('status', 'available')->count(),
            'claimed_items' => LostItem::where('status', 'claimed')->count(),
            'returned_items' => LostItem::where('status', 'returned')->count(),
            'pending_claims' => Claim::where('status', 'pending')->count(),
            'total_students' => User::where('role', 'student')->count(),
        ];

        $recentClaims = Claim::with(['item', 'user'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        $recentItems = LostItem::with('uploader')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentClaims', 'recentItems'));
    }

    public function items()
    {
        $items = LostItem::with('uploader')
            ->latest()
            ->paginate(15);

        return view('admin.items.index', compact('items'));
    }

    public function claims()
    {
        $claims = Claim::with(['item', 'user', 'reviewer'])
            ->latest()
            ->paginate(15);

        return view('admin.claims.index', compact('claims'));
    }

    public function showClaim(Claim $claim)
    {
        $claim->load(['item', 'user', 'reviewer']);

        return view('admin.claims.show', compact('claim'));
    }

    public function reviewClaim(Request $request, Claim $claim)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:approved,rejected'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $claim->update([
            'status' => $validated['status'],
            'admin_notes' => $validated['admin_notes'] ?? null,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        if ($validated['status'] === 'approved') {
            $claim->item->update([
                'status' => 'claimed',
                'claimed_by' => $claim->user_id,
                'claimed_at' => now(),
            ]);
        }

        return redirect()->route('admin.claims.index')
            ->with('success', 'Claim reviewed successfully.');
    }

    public function markAsReturned(LostItem $item)
    {
        $item->update([
            'status' => 'returned',
            'returned_at' => now(),
        ]);

        return redirect()->route('admin.items.index')
            ->with('success', 'Item marked as returned.');
    }

    public function students()
    {
        $students = User::where('role', 'student')
            ->latest()
            ->paginate(20);

        return view('admin.students', compact('students'));
    }
}
