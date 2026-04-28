<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelolaPackageController extends Controller
{
    public function index()
    {
        $packages = TourPackage::with('category')->latest()->paginate(10);
        return view('admin.kelola_paket.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.kelola_paket.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'package_type' => 'required|string|max:100',
            'category_id'  => 'required|exists:categories,id',
            'duration'     => 'required|string|max:100',
            'city'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price_1pax'   => 'nullable|integer',
            'price_2pax'   => 'nullable|integer',
            'price_3pax'   => 'nullable|integer',
            'price_4pax'   => 'nullable|integer',
            'price_5pax'   => 'nullable|integer',
            'price_8pax'   => 'nullable|integer',
            'price_10pax'  => 'nullable|integer',
            'meeting_point'       => 'nullable|string',
            'daily_schedule'      => 'nullable|string',
            'itinerary'           => 'nullable|string',
            'persyaratan'         => 'nullable|string',
            'facilities_included' => 'nullable|string',
            'facilities_excluded' => 'nullable|string',
            'dp_days_before'      => 'nullable|integer',
            'payment'             => 'nullable|string',
            'is_active'           => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['package_name']) . '-' . time();
        $validated['is_active'] = $request->has('is_active');

        TourPackage::create($validated);

        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil ditambahkan!');
    }

    public function edit(TourPackage $kelolaPackage)
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.kelola_paket.edit', compact('kelolaPackage', 'categories'));
    }

    public function update(Request $request, TourPackage $kelolaPackage)
    {
        $validated = $request->validate([
            'package_name' => 'required|string|max:255',
            'package_type' => 'required|string|max:100',
            'category_id'  => 'required|exists:categories,id',
            'duration'     => 'required|string|max:100',
            'city'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price_1pax'   => 'nullable|integer',
            'price_2pax'   => 'nullable|integer',
            'price_3pax'   => 'nullable|integer',
            'price_4pax'   => 'nullable|integer',
            'price_5pax'   => 'nullable|integer',
            'price_8pax'   => 'nullable|integer',
            'price_10pax'  => 'nullable|integer',
            'meeting_point'       => 'nullable|string',
            'daily_schedule'      => 'nullable|string',
            'itinerary'           => 'nullable|string',
            'persyaratan'         => 'nullable|string',
            'facilities_included' => 'nullable|string',
            'facilities_excluded' => 'nullable|string',
            'dp_days_before'      => 'nullable|integer',
            'payment'             => 'nullable|string',
            'is_active'           => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $kelolaPackage->update($validated);

        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil diperbarui!');
    }

    public function destroy(TourPackage $kelolaPackage)
    {
        $kelolaPackage->delete();
        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil dihapus!');
    }
}
