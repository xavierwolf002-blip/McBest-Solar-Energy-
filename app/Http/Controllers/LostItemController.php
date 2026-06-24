<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with('uploader')->where('status', 'available');
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('item_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location_found', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        $items = $query->latest()->paginate(12);
        
        return view('items.index', compact('items'));
    }

    public function show(LostItem $item)
    {
        $item->load(['uploader', 'claims' => function($query) {
            $query->where('user_id', auth()->id());
        }]);
        
        return view('items.show', compact('item'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'location_found' => ['required', 'string', 'max:255'],
            'date_found' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $validated['uploaded_by'] = auth()->id();
        $validated['status'] = 'available';

        LostItem::create($validated);

        return redirect()->route('admin.items.index')->with('success', 'Item added successfully.');
    }

    public function edit(LostItem $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, LostItem $item)
    {
        $validated = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'max:255'],
            'location_found' => ['required', 'string', 'max:255'],
            'date_found' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($validated);

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(LostItem $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
