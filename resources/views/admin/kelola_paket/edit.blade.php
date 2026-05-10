@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.kelola-paket-wisata.index') }}"
            class="flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white/90">Edit Paket Wisata</h1>
            <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">{{ $kelolaPackage->package_name }}</p>
        </div>
    </div>

    <!-- Validation Errors -->
    @if($errors->any())
    <div class="rounded-lg border border-error-300 bg-error-50 px-4 py-3 dark:border-error-700 dark:bg-error-500/15">
        <ul class="list-inside list-disc space-y-1 text-sm text-error-700 dark:text-error-400">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.kelola-paket-wisata.update', $kelolaPackage) }}" method="POST" x-data="{ activeTab: 'id' }">
        @csrf
        @method('PUT')

        <!-- Language Switcher Tabs -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex p-1 bg-gray-100 dark:bg-gray-800 rounded-xl w-fit">
                <button type="button" @click="activeTab = 'id'" 
                    :class="activeTab === 'id' ? 'bg-white dark:bg-gray-700 shadow-sm text-brand-600 dark:text-brand-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                    class="px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                    🇮🇩 Bahasa Indonesia
                </button>
                <button type="button" @click="activeTab = 'en'" 
                    :class="activeTab === 'en' ? 'bg-white dark:bg-gray-700 shadow-sm text-brand-600 dark:text-brand-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                    class="px-4 py-2 rounded-lg text-sm font-semibold transition-all">
                    🇬🇧 English
                </button>
            </div>
            <div class="text-xs text-gray-500 dark:text-gray-400 italic">
                <span x-show="activeTab === 'id'">Mengedit konten dalam Bahasa Indonesia</span>
                <span x-show="activeTab === 'en'">Editing content in English</span>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
            <!-- Left Column -->
            <div class="col-span-1 space-y-6 xl:col-span-2">

                <!-- Informasi Utama -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <h2 class="mb-5 text-base font-semibold text-gray-800 dark:text-white/90">Informasi Utama</h2>
                    <div class="space-y-5">
                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Nama Paket <span class="text-error-500">*</span>
                            </label>
                            <input type="text" name="package_name" value="{{ old('package_name', $kelolaPackage->package_name) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" />
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Package Name (English)
                            </label>
                            <input type="text" name="package_name_en" value="{{ old('package_name_en', $kelolaPackage->package_name_en) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90" />
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Tipe Paket <span class="text-error-500">*</span></label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select name="package_type_id" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">
                                        <option value="" class="dark:bg-gray-900">Pilih Tipe Paket</option>
                                        @foreach($packageTypes as $type)
                                            <option value="{{ $type->id }}" {{ old('package_type_id', $kelolaPackage->package_type_id) == $type->id ? 'selected' : '' }} class="dark:bg-gray-900">{{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500"><svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                </div>
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Kategori <span class="text-error-500">*</span></label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select name="category_id" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('category_id', $kelolaPackage->category_id) == $cat->id ? 'selected' : '' }} class="dark:bg-gray-900">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500"><svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                </div>
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Kota <span class="text-error-500">*</span></label>
                                <input type="text" name="city" value="{{ old('city', $kelolaPackage->city) }}"
                                    class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                            </div>
                            <div>
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Durasi <span class="text-error-500">*</span></label>
                                <input type="text" name="duration" value="{{ old('duration', $kelolaPackage->duration) }}"
                                    class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                            </div>
                        </div>

                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi</label>
                            <textarea id="editor-description" name="description" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('description', $kelolaPackage->description) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Description (English)</label>
                            <textarea id="editor-description-en" name="description_en" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('description_en', $kelolaPackage->description_en) }}</textarea>
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Destinasi</label>
                            <input type="text" name="destination" value="{{ old('destination', $kelolaPackage->destination) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                        </div>
                    </div>
                </div>

                <!-- Harga -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]" x-data="{ priceTab: 'local' }">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-base font-semibold text-gray-800 dark:text-white/90">Harga per Pax (Rp)</h2>
                        <div class="flex p-1 bg-gray-100 dark:bg-gray-800 rounded-lg">
                            <button type="button" @click="priceTab = 'local'" 
                                :class="priceTab === 'local' ? 'bg-white dark:bg-gray-700 shadow-sm text-brand-600' : 'text-gray-500'"
                                class="px-3 py-1.5 rounded-md text-xs font-medium transition-all">
                                Lokal
                            </button>
                            <button type="button" @click="priceTab = 'foreign'" 
                                :class="priceTab === 'foreign' ? 'bg-white dark:bg-gray-700 shadow-sm text-brand-600' : 'text-gray-500'"
                                class="px-3 py-1.5 rounded-md text-xs font-medium transition-all">
                                Mancanegara
                            </button>
                        </div>
                    </div>

                    <!-- Harga Lokal -->
                    <div x-show="priceTab === 'local'" class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        @foreach([1,2,3,4,5,8,10] as $pax)
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">{{ $pax }} Pax</label>
                            <input type="number" name="price_{{ $pax }}pax" value="{{ old('price_'.$pax.'pax', $kelolaPackage->{'price_'.$pax.'pax'}) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                        </div>
                        @endforeach
                    </div>

                    <!-- Harga Mancanegara -->
                    <div x-show="priceTab === 'foreign'" x-cloak class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        @foreach([1,2,3,4,5,8,10] as $pax)
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">{{ $pax }} Pax</label>
                            <input type="number" name="price_{{ $pax }}pax_foreign" value="{{ old('price_'.$pax.'pax_foreign', $kelolaPackage->{'price_'.$pax.'pax_foreign'}) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Jadwal & Itinerary -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <h2 class="mb-5 text-base font-semibold text-gray-800 dark:text-white/90">Jadwal & Itinerary</h2>
                    <div class="space-y-5">
                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Jadwal Harian</label>
                            <textarea id="editor-daily-schedule" name="daily_schedule" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('daily_schedule', $kelolaPackage->daily_schedule) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Daily Schedule (English)</label>
                            <textarea id="editor-daily-schedule-en" name="daily_schedule_en" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('daily_schedule_en', $kelolaPackage->daily_schedule_en) }}</textarea>
                        </div>

                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Itinerary</label>
                            <textarea id="editor-itinerary" name="itinerary" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('itinerary', $kelolaPackage->itinerary) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Itinerary (English)</label>
                            <textarea id="editor-itinerary-en" name="itinerary_en" rows="4" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('itinerary_en', $kelolaPackage->itinerary_en) }}</textarea>
                        </div>

                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Meeting Point</label>
                            <textarea name="meeting_point" rows="2" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('meeting_point', $kelolaPackage->meeting_point) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Meeting Point (English)</label>
                            <textarea name="meeting_point_en" rows="2" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('meeting_point_en', $kelolaPackage->meeting_point_en) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Fasilitas -->
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <h2 class="mb-5 text-base font-semibold text-gray-800 dark:text-white/90">Fasilitas & Persyaratan</h2>
                    <div class="space-y-5">
                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Fasilitas Termasuk</label>
                            <textarea id="editor-facilities-included" name="facilities_included" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('facilities_included', $kelolaPackage->facilities_included) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Facilities Included (English)</label>
                            <textarea id="editor-facilities-included-en" name="facilities_included_en" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('facilities_included_en', $kelolaPackage->facilities_included_en) }}</textarea>
                        </div>

                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Fasilitas Tidak Termasuk</label>
                            <textarea id="editor-facilities-excluded" name="facilities_excluded" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('facilities_excluded', $kelolaPackage->facilities_excluded) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Facilities Excluded (English)</label>
                            <textarea id="editor-facilities-excluded-en" name="facilities_excluded_en" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('facilities_excluded_en', $kelolaPackage->facilities_excluded_en) }}</textarea>
                        </div>

                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Persyaratan</label>
                            <textarea id="editor-persyaratan" name="persyaratan" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('persyaratan', $kelolaPackage->persyaratan) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Requirements (English)</label>
                            <textarea id="editor-persyaratan-en" name="persyaratan_en" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('persyaratan_en', $kelolaPackage->persyaratan_en) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-span-1 space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <h2 class="mb-5 text-base font-semibold text-gray-800 dark:text-white/90">Pengaturan</h2>
                    <div class="space-y-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-400">Status Aktif</p>
                                <p class="text-xs text-gray-500 mt-0.5">Paket tampil di website</p>
                            </div>
                            <label class="relative inline-flex cursor-pointer items-center">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                    {{ old('is_active', $kelolaPackage->is_active) ? 'checked' : '' }}>
                                <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-brand-500 peer-checked:after:translate-x-full dark:bg-gray-700"></div>
                            </label>
                        </div>
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">DP H-Berapa</label>
                            <input type="number" name="dp_days_before" value="{{ old('dp_days_before', $kelolaPackage->dp_days_before) }}"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden" />
                        </div>
                        <div x-show="activeTab === 'id'">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Info Pembayaran</label>
                            <textarea name="payment" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('payment', $kelolaPackage->payment) }}</textarea>
                        </div>
                        <div x-show="activeTab === 'en'" x-cloak>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Payment Info (English)</label>
                            <textarea name="payment_en" rows="3" class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:ring-3 focus:outline-hidden">{{ old('payment_en', $kelolaPackage->payment_en) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex flex-col gap-3">
                        <button type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-3 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Perbarui Paket
                        </button>
                        <a href="{{ route('admin.kelola-paket-wisata.index') }}"
                            class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-transparent dark:text-gray-400 dark:hover:bg-gray-800 transition-colors">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    const editors = [
        '#editor-description',
        '#editor-description-en',
        '#editor-daily-schedule',
        '#editor-daily-schedule-en',
        '#editor-itinerary',
        '#editor-itinerary-en',
        '#editor-facilities-included',
        '#editor-facilities-included-en',
        '#editor-facilities-excluded',
        '#editor-facilities-excluded-en',
        '#editor-persyaratan',
        '#editor-persyaratan-en'
    ];

    editors.forEach(selector => {
        ClassicEditor
            .create(document.querySelector(selector), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
<style>
    .ck-editor__editable {
        min-height: 200px;
        background-color: transparent !important;
        color: inherit !important;
    }
    .dark .ck-editor__editable {
        background-color: rgb(17 24 39 / var(--tw-bg-opacity)) !important;
        color: white !important;
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border-color: rgb(209 213 219) !important;
    }
    .dark .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border-color: rgb(55 65 81) !important;
    }
</style>
@endpush

