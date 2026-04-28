@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Page Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.user-profile.index') }}"
            class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white/90">Detail Pengguna</h1>
            <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">{{ $user->name }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        <!-- Profile Card -->
        <div class="col-span-1">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <!-- Avatar -->
                <div class="flex flex-col items-center text-center">
                    <div class="flex h-20 w-20 items-center justify-center rounded-full bg-brand-100 text-3xl font-bold text-brand-700 dark:bg-brand-500/20 dark:text-brand-400 mb-4">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $user->name }}</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    <span class="mt-3 inline-flex items-center rounded-full bg-success-50 px-3 py-1 text-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-400">
                        Customer
                    </span>
                </div>

                <!-- Stats -->
                <div class="mt-6 grid grid-cols-1 gap-3 border-t border-gray-100 pt-6 dark:border-gray-800">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">No. Telepon</span>
                        <span class="font-medium text-gray-800 dark:text-white/90">{{ $user->phone ?? '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Bergabung</span>
                        <span class="font-medium text-gray-800 dark:text-white/90">{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-6 flex flex-col gap-2">
                    <a href="{{ route('admin.user-profile.edit', $user) }}"
                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Data
                    </a>
                    <form action="{{ route('admin.user-profile.destroy', $user) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-lg border border-error-200 bg-error-50 px-4 py-2.5 text-sm font-medium text-error-700 hover:bg-error-100 dark:border-error-700 dark:bg-error-500/15 dark:text-error-400 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Pengguna
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Detail -->
        <div class="col-span-1 xl:col-span-2 space-y-6">

            <!-- Informasi Akun -->
            <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <h3 class="mb-5 text-base font-semibold text-gray-800 dark:text-white/90">Informasi Akun</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Nama Lengkap</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Email</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">No. Telepon</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->phone ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Status Email</p>
                            @if($user->email_verified_at)
                                <span class="inline-flex items-center gap-1 text-sm font-medium text-success-600 dark:text-success-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Terverifikasi
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-sm font-medium text-warning-600 dark:text-warning-400">
                                    Belum Terverifikasi
                                </span>
                            @endif
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Tanggal Daftar</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-1">Terakhir Diperbarui</p>
                            <p class="text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
