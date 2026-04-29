@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white/90">Kelola Pemesanan</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar seluruh pemesanan paket wisata dari pelanggan</p>
        </div>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="flex items-center gap-3 rounded-lg border border-success-300 bg-success-50 px-4 py-3 text-sm text-success-700 dark:border-success-700 dark:bg-success-500/15 dark:text-success-400">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Table Card -->
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px] text-left text-sm">
                <!-- Table Head -->
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800">
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Kode Booking</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Nama Pelanggan</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Nama Paket</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Tanggal Trip</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Total Harga</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Status Pembayaran</th>
                        <th class="whitespace-nowrap px-5 py-4 font-medium text-gray-500 dark:text-gray-400">Aksi</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($bookings as $booking)
                    <tr class="group hover:bg-gray-50 dark:hover:bg-white/[0.02] transition-colors">

                        <!-- Kode Booking -->
                        <td class="whitespace-nowrap px-5 py-4">
                            <span class="font-mono text-xs font-semibold text-brand-600 dark:text-brand-400 bg-brand-50 dark:bg-brand-500/10 px-2 py-1 rounded-md">
                                {{ $booking->booking_code }}
                            </span>
                        </td>

                        <!-- Nama Pelanggan -->
                        <td class="px-5 py-4">
                            <div>
                                <p class="font-medium text-gray-800 dark:text-white/90">{{ $booking->customer_name }}</p>
                                <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">{{ $booking->customer_email }}</p>
                            </div>
                        </td>

                        <!-- Nama Paket -->
                        <td class="px-5 py-4 text-gray-700 dark:text-gray-300">
                            {{ $booking->tourPackage?->package_name ?? '<span class="text-gray-400 italic">Paket dihapus</span>' }}
                        </td>

                        <!-- Tanggal Trip -->
                        <td class="whitespace-nowrap px-5 py-4 text-gray-600 dark:text-gray-400">
                            {{ $booking->trip_date->format('d M Y') }}
                        </td>

                        <!-- Total Harga -->
                        <td class="whitespace-nowrap px-5 py-4 font-medium text-gray-800 dark:text-white/90">
                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                        </td>

                        <!-- Status Pembayaran -->
                        <td class="whitespace-nowrap px-5 py-4">
                            @php
                                $statusConfig = [
                                    'paid'    => ['label' => 'Lunas',   'class' => 'bg-success-50 text-success-700 dark:bg-success-500/15 dark:text-success-400'],
                                    'dp'      => ['label' => 'DP',      'class' => 'bg-warning-50 text-warning-700 dark:bg-warning-500/15 dark:text-warning-400'],
                                    'pending' => ['label' => 'Pending', 'class' => 'bg-gray-100 text-gray-600 dark:bg-white/5 dark:text-gray-400'],
                                    'failed'  => ['label' => 'Gagal',   'class' => 'bg-error-50 text-error-700 dark:bg-error-500/15 dark:text-error-400'],
                                    'refunded'=> ['label' => 'Refund',  'class' => 'bg-blue-50 text-blue-700 dark:bg-blue-500/15 dark:text-blue-400'],
                                ];
                                $cfg = $statusConfig[$booking->payment_status] ?? ['label' => ucfirst($booking->payment_status), 'class' => 'bg-gray-100 text-gray-600'];
                            @endphp
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $cfg['class'] }}">
                                {{ $cfg['label'] }}
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td class="whitespace-nowrap px-5 py-4">
                            <div class="flex items-center gap-2">

                                {{-- Tombol Detail --}}
                                <a href="{{ route('admin.kelola-pemesanan.show', $booking) }}"
                                    title="Lihat Detail"
                                    class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 hover:text-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.kelola-pemesanan.destroy', $booking) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus pemesanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        title="Hapus"
                                        class="flex h-8 w-8 items-center justify-center rounded-lg border border-error-200 bg-error-50 text-error-600 hover:bg-error-100 dark:border-error-700 dark:bg-error-500/15 dark:text-error-400 dark:hover:bg-error-500/25 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-5 py-14 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-sm text-gray-400 dark:text-gray-500">Belum ada data pemesanan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($bookings->hasPages())
        <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-800">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>

</div>
@endsection

