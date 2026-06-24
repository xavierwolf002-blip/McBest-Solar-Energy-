<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClaimController extends Controller
{
    public function create(LostItem $item)
    {
        if ($item->status !== 'available') {
            return redirect()->route('items.show', $item)
                ->with('error', 'This item is no longer available for claims.');
        }

        $existingClaim = Claim::where('item_id', $item->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingClaim) {
            return redirect()->route('items.show', $item)
                ->with('error', 'You have already submitted a claim for this item.');
        }

        return view('claims.create', compact('item'));
    }

    public function store(Request $request, LostItem $item)
    {
        $validated = $request->validate([
            'proof_description' => ['required', 'string'],
            'proof_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('proof_image')) {
            $validated['proof_image'] = $request->file('proof_image')->store('proofs', 'public');
        }

        $validated['item_id'] = $item->id;
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        Claim::create($validated);

        return redirect()->route('claims.my')->with('success', 'Claim submitted successfully.');
    }

    public function myClaims()
    {
        $claims = Claim::where('user_id', auth()->id())
            ->with(['item', 'reviewer'])
            ->latest()
            ->paginate(10);

        return view('claims.my-claims', compact('claims'));
    }
}
