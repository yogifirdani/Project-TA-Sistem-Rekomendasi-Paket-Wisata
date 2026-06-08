<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TourPackage;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecommendationController extends Controller
{
    /**
     * Menampilkan form input preferensi wisatawan.
     */
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        return view('recommendation', compact('categories'));
    }

    /**
     * Memproses preferensi wisatawan, mengirimkan ke Python API,
     * dan menampilkan rekomendasi hasil Cosine Similarity.
     */
    public function getRecommendations(Request $request)
    {
        $request->validate([
            'tour_category'        => 'required|string|in:Culture Trip,Nature Trip,Culinary Trip,Adventure Trip',
            'description'          => 'nullable|string',
            'budget'               => 'required|numeric|min:0',
            'duration'             => 'required|string|max:100',
            'facilities'           => 'required|string',
        ]);

        try {
            // 1. Simpan/Update preferensi wisatawan berdasarkan session_id ke tabel 'user_preferences'
            $preference = UserPreference::updateOrCreate(
                ['session_id' => session()->getId()],
                [
                    'category_id'          => null,
                    'tour_category'        => $request->tour_category,
                    'description'          => $request->description,
                    'budget'               => $request->budget,
                    'preferred_duration'   => $request->duration,
                    'preferred_facilities' => $request->facilities,
                ]
            );

            // 2. Panggil API Python untuk memproses Cosine Similarity
            $response = Http::timeout(5)->post('http://localhost:5000/recommend', [
                'preference_id' => $preference->id
            ]);

            $packages = collect();
            if ($response->successful()) {
                $data = $response->json();
                // Mendukung list of objects (e.g. [{'id': 1}, ...]) atau list of IDs (e.g. [1, 2, ...])
                $rekomendasiPaket = $data['data'] ?? [];

                $packageIds = [];
                if (is_array($rekomendasiPaket)) {
                    foreach ($rekomendasiPaket as $item) {
                        if (is_numeric($item)) {
                            $packageIds[] = (int) $item;
                        } elseif (is_array($item) && isset($item['package_id'])) {
                            $packageIds[] = (int) $item['package_id'];
                        }
                    }
                }

                if (!empty($packageIds)) {
                    $idsString = implode(',', $packageIds);
                    $packages = TourPackage::with(['category', 'packageType'])
                        ->whereIn('id', $packageIds)
                        ->orderByRaw("FIELD(id, {$idsString})")
                        ->get();
                }
            } else {
                Log::warning('Python recommend API returned error: ' . $response->status() . ' - ' . $response->body());
                return back()->withInput()->with('error', app()->getLocale() == 'en' 
                    ? 'Failed to fetch recommendations from AI engine. Please make sure the AI server is running.' 
                    : 'Gagal mendapatkan rekomendasi dari AI engine. Pastikan server AI telah dijalankan.');
            }

            $categories = Category::where('is_active', true)->get();
            return view('recommendation', compact('categories', 'packages', 'preference'));

        } catch (\Exception $e) {
            Log::error('Recommendation system error: ' . $e->getMessage());
            return back()->withInput()->with('error', app()->getLocale() == 'en'
                ? 'An error occurred while connecting to the recommendation server: ' . $e->getMessage()
                : 'Terjadi kesalahan saat menghubungkan ke server rekomendasi: ' . $e->getMessage());
        }
    }
}
