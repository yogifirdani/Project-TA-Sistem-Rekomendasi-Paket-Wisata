@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white/90">Kelola Paket Wisata</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar semua paket wisata yang tersedia</p>
        </div>
        <a href="{{ route('admin.kelola-paket-wisata.create') }}"
            class="inline-flex items-center gap-2 self-start sm:self-auto rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Paket
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="flex items-center gap-3 rounded-lg border border-success-300 bg-success-50 px-4 py-3 text-sm text-success-700 dark:border-success-700 dark:bg-success-500/15 dark:text-success-400">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Table Card -->
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-sm">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-800">
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">#</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Nama Paket</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Kategori</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Tipe</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Kota</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Durasi</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Status</th>
                        <th class="px-5 py-4 text-left font-medium text-gray-500 dark:text-gray-400">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($packages as $index => $package)
                    <tr class="hover:bg-gray-50 dark:hover:bg-white/[0.02] transition-colors">
                        <td class="px-5 py-4 text-gray-500 dark:text-gray-400">{{ $packages->firstItem() + $index }}</td>
                        <td class="px-5 py-4 font-medium text-gray-800 dark:text-white/90">{{ $package->package_name }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-300">{{ $package->category->category_name ?? '-' }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-300">{{ $package->package_type }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-300">{{ $package->city }}</td>
                        <td class="px-5 py-4 text-gray-600 dark:text-gray-300">{{ $package->duration }}</td>
                        <td class="px-5 py-4">
                            @if($package->is_active)
                                <span class="inline-flex rounded-full bg-success-50 px-2.5 py-0.5 text-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-400">Aktif</span>
                            @else
                                <span class="inline-flex rounded-full bg-error-50 px-2.5 py-0.5 text-xs font-medium text-error-700 dark:bg-error-500/15 dark:text-error-400">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.kelola-paket-wisata.edit', $package) }}"
                                    class="rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.kelola-paket-wisata.destroy', $package) }}" method="POST"
                                    onsubmit="return confirm('Hapus paket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="rounded-lg border border-error-200 bg-error-50 px-3 py-1.5 text-xs font-medium text-error-700 hover:bg-error-100 dark:border-error-700 dark:bg-error-500/15 dark:text-error-400 transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-5 py-10 text-center text-gray-400 dark:text-gray-500">
                            Belum ada paket wisata. <a href="{{ route('admin.kelola-paket-wisata.create') }}" class="text-brand-500 hover:underline">Tambah sekarang</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($packages->hasPages())
        <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-800">
            {{ $packages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

