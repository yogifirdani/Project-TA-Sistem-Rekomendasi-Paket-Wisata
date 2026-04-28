<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('tourPackage')
            ->latest()
            ->paginate(15);

        return view('admin.kelola_pemesanan', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load('tourPackage');
        return view('admin.kelola_pemesanan_detail', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.kelola-pemesanan.index')
            ->with('success', 'Data pemesanan berhasil dihapus.');
    }
}

