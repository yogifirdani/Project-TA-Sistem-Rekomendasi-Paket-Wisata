<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\Category;
use App\Models\PackageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelolaPackageController extends Controller
{
    /**
     * Menampilkan daftar paket wisata dengan fitur pencarian dan pagination AJAX.
     */
    public function index(Request $request)
    {
        // Query dasar dengan eager loading untuk optimasi performa
        $query = TourPackage::with(['category', 'packageType'])->latest();

        // Logika pencarian berdasarkan nama, kota, atau kategori
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('package_name', 'like', "%{$search}%")
                  ->orWhere('package_name_en', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q2) use ($search) {
                      $q2->where('category_name', 'like', "%{$search}%")
                        ->orWhere('category_name_en', 'like', "%{$search}%");
                  });
            });
        }

        // Ambil data dengan pagination (10 item per halaman)
        $packages = $query->paginate(10)->withQueryString();

        // Jika request via AJAX (pencarian/pagination), return partial view tabel saja
        if ($request->ajax()) {
            return view('admin.kelola_paket._table', compact('packages'))->render();
        }

        return view('admin.kelola_paket.index', compact('packages'));
    }

    /**
     * Menampilkan form untuk membuat paket wisata baru.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        $packageTypes = PackageType::all();
        return view('admin.kelola_paket.create', compact('categories', 'packageTypes'));
    }

    /**
     * Menyimpan data paket wisata baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_name'        => 'required|string|max:255',
            'package_name_en'     => 'nullable|string|max:255',
            'package_type_id'     => 'required|exists:package_types,id',
            'category_id'         => 'required|exists:categories,id',
            'duration'            => 'required|string|max:100',
            'city'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'description_en'      => 'nullable|string',
            'price_1pax'          => 'nullable|integer',
            'price_1pax_foreign'  => 'nullable|integer',
            'price_2pax'          => 'nullable|integer',
            'price_2pax_foreign'  => 'nullable|integer',
            'price_3pax'          => 'nullable|integer',
            'price_3pax_foreign'  => 'nullable|integer',
            'price_4pax'          => 'nullable|integer',
            'price_4pax_foreign'  => 'nullable|integer',
            'price_5pax'          => 'nullable|integer',
            'price_5pax_foreign'  => 'nullable|integer',
            'price_8pax'          => 'nullable|integer',
            'price_8pax_foreign'  => 'nullable|integer',
            'price_10pax'         => 'nullable|integer',
            'price_10pax_foreign' => 'nullable|integer',
            'meeting_point'       => 'nullable|string',
            'meeting_point_en'    => 'nullable|string',
            'daily_schedule'      => 'nullable|string',
            'daily_schedule_en'   => 'nullable|string',
            'itinerary'           => 'nullable|string',
            'itinerary_en'        => 'nullable|string',
            'persyaratan'         => 'nullable|string',
            'persyaratan_en'      => 'nullable|string',
            'facilities_included' => 'nullable|string',
            'facilities_included_en' => 'nullable|string',
            'facilities_excluded' => 'nullable|string',
            'facilities_excluded_en' => 'nullable|string',
            'dp_days_before'      => 'nullable|integer',
            'payment'             => 'nullable|string',
            'payment_en'          => 'nullable|string',
            'is_active'           => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['package_name']) . '-' . time();
        $validated['is_active'] = $request->has('is_active');

        TourPackage::create($validated);

        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail lengkap sebuah paket wisata.
     */
    public function show(TourPackage $kelolaPackage)
    {
        $kelolaPackage->load(['category', 'packageType']);
        return view('admin.kelola_paket.show', compact('kelolaPackage'));
    }

    /**
     * Menampilkan form edit untuk paket wisata.
     */
    public function edit(TourPackage $kelolaPackage)
    {
        $categories = Category::where('is_active', true)->get();
        $packageTypes = PackageType::all();
        return view('admin.kelola_paket.edit', compact('kelolaPackage', 'categories', 'packageTypes'));
    }

    /**
     * Memperbarui data paket wisata di database.
     */
    public function update(Request $request, TourPackage $kelolaPackage)
    {
        $validated = $request->validate([
            'package_name'        => 'required|string|max:255',
            'package_name_en'     => 'nullable|string|max:255',
            'package_type_id'     => 'required|exists:package_types,id',
            'category_id'         => 'required|exists:categories,id',
            'duration'            => 'required|string|max:100',
            'city'                => 'required|string|max:255',
            'description'         => 'nullable|string',
            'description_en'      => 'nullable|string',
            'price_1pax'          => 'nullable|integer',
            'price_1pax_foreign'  => 'nullable|integer',
            'price_2pax'          => 'nullable|integer',
            'price_2pax_foreign'  => 'nullable|integer',
            'price_3pax'          => 'nullable|integer',
            'price_3pax_foreign'  => 'nullable|integer',
            'price_4pax'          => 'nullable|integer',
            'price_4pax_foreign'  => 'nullable|integer',
            'price_5pax'          => 'nullable|integer',
            'price_5pax_foreign'  => 'nullable|integer',
            'price_8pax'          => 'nullable|integer',
            'price_8pax_foreign'  => 'nullable|integer',
            'price_10pax'         => 'nullable|integer',
            'price_10pax_foreign' => 'nullable|integer',
            'meeting_point'       => 'nullable|string',
            'meeting_point_en'    => 'nullable|string',
            'daily_schedule'      => 'nullable|string',
            'daily_schedule_en'   => 'nullable|string',
            'itinerary'           => 'nullable|string',
            'itinerary_en'        => 'nullable|string',
            'persyaratan'         => 'nullable|string',
            'persyaratan_en'      => 'nullable|string',
            'facilities_included' => 'nullable|string',
            'facilities_included_en' => 'nullable|string',
            'facilities_excluded' => 'nullable|string',
            'facilities_excluded_en' => 'nullable|string',
            'dp_days_before'      => 'nullable|integer',
            'payment'             => 'nullable|string',
            'payment_en'          => 'nullable|string',
            'is_active'           => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $kelolaPackage->update($validated);

        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil diperbarui!');
    }

    /**
     * Menghapus paket wisata dari database.
     */
    public function destroy(TourPackage $kelolaPackage)
    {
        $kelolaPackage->delete();
        return redirect()->route('admin.kelola-paket-wisata.index')
            ->with('success', 'Paket wisata berhasil dihapus!');
    }
}
