@extends('template')

@section('content')

<style>
    /* Ubah warna teks navbar menjadi hitam di halaman detail (sebelum di-scroll) */
    #ftco-navbar:not(.scrolled) .nav-link {
        color: #222222 !important;
        font-weight: normal;
    }
    /* Warna saat menu aktif atau di-hover menjadi warna brand */
    #ftco-navbar:not(.scrolled) .nav-item.active .nav-link,
    #ftco-navbar:not(.scrolled) .nav-link:hover {
        color: rgb(87, 201, 209) !important;
    }
    /* Ikon panah bawah (dropdown) */
    #ftco-navbar:not(.scrolled) .nav-link i {
        color: #222222 !important;
    }
    /* Tombol Sign Up (garis tepi) */
    #ftco-navbar:not(.scrolled) .cta .nav-link span {
        color: #222222 !important;
        border-color: #222222 !important;
    }
    /* Efek hover Sign Up (Register) agar rapi */
    #ftco-navbar:not(.scrolled) .cta .nav-link:hover {
        background: transparent !important;
    }
    #ftco-navbar:not(.scrolled) .cta .nav-link span {
        transition: all 0.3s ease;
    }
    #ftco-navbar:not(.scrolled) .cta .nav-link:hover span {
        background: rgb(87, 201, 209) !important;
        border-color: rgb(87, 201, 209) !important;
        color: #fff !important;
    }
    /* Ikon Menu (hamburger di mobile) */
    #ftco-navbar:not(.scrolled) .navbar-toggler {
        color: #222222 !important;
    }
</style>

<section class="ftco-section bg-light" style="padding-top: 90px; padding-bottom: 80px;">
  <div class="container">
    
    <div class="row">
      <!-- Kiri: Detail Paket -->
      <div class="col-lg-8 ftco-animate">
        <div class="bg-white p-3 p-md-4 mb-5 shadow-sm" style="border-radius: 16px; border: 1px solid rgba(0,0,0,0.05);">
            
            <!-- Gambar Destinasi (Nanti diambil dari database) -->
            <div class="mb-4" style="border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <img src="{{ asset('images/background/jungle-island.webp') }}" 
                     alt="{{ $package->getTranslation('package_name') }}" 
                     class="img-fluid w-100" 
                     style="object-fit: cover; max-height: 500px;" 
                     loading="lazy" 
                     width="800" 
                     height="500">
            </div>

            <!-- Title & Breadcrumbs -->
            <div class="mb-4 pb-4" style="border-bottom: 1px solid #eee;">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2"><a href="{{ url('/') }}" style="color: #666; font-weight: 500;">{{ __('messages.home') }}</a> <span style="color: #ccc; margin: 0 5px;">/</span></span> 
                    <span class="mr-2"><a href="{{ route('paket-wisata') }}" style="color: #666; font-weight: 500;">{{ __('messages.tour_packages') }}</a> <span style="color: #ccc; margin: 0 5px;">/</span></span>
                    <span style="color: #2188ff; font-weight: 600;">{{ $package->getTranslation('package_name') }}</span>
                </p>
                <h1 class="mb-0" style="font-weight: 800; font-size: 26px; color: #222; line-height: 1.3;">{{ $package->getTranslation('package_name') }}</h1>
            </div>

            <!-- Quick Info -->
            <div class="d-flex flex-wrap mb-4 pb-3" style="border-bottom: 1px solid #eee;">
                <div class="mr-4 mb-2">
                    <span style="color: #999; font-size: 13px; font-weight: 600; display: block;">{{ __('messages.category') }}</span>
                    <span style="color: #222; font-weight: 700;">{{ $package->category ? $package->category->getTranslation('category_name') : __('messages.tour_packages') }}</span>
                </div>
                <div class="mr-4 mb-2">
                    <span style="color: #999; font-size: 13px; font-weight: 600; display: block;">{{ __('messages.type') }}</span>
                    <span style="color: #222; font-weight: 700;">{{ $package->packageType ? $package->packageType->getTranslation('type_name') : 'Reguler' }}</span>
                </div>
                <div class="mr-4 mb-2">
                    <span style="color: #999; font-size: 13px; font-weight: 600; display: block;">{{ __('messages.duration') }}</span>
                    <span style="color: #222; font-weight: 700;"><i class="icon-clock-o mr-1" style="color: #2188ff;"></i> {{ $package->duration }}</span>
                </div>
                <div class="mb-2">
                    <span style="color: #999; font-size: 13px; font-weight: 600; display: block;">{{ __('messages.city') }}</span>
                    <span style="color: #222; font-weight: 700;"><i class="icon-map-o mr-1" style="color: #2188ff;"></i> {{ $package->city }}</span>
                </div>
            </div>

            <!-- Description -->
            <h3 class="mb-3" style="font-weight: 700; font-size: 22px;">{{ __('messages.description') }}</h3>
            <div style="color: #555; line-height: 1.8;">{!! $package->getTranslation('description') !!}</div>
            
            @if($package->destination)
            <div class="mt-4">
                <h3 class="mb-3" style="font-weight: 700; font-size: 20px;">{{ __('messages.destination_goal') }}</h3>
                <p style="color: #555; line-height: 1.8;">{!! nl2br(e($package->destination)) !!}</p>
            </div>
            @endif

            @if($package->meeting_point)
            <div class="mt-4 p-4" style="background-color: #f8f9fa; border-left: 4px solid #2188ff; border-radius: 4px;">
                <h4 style="font-weight: 700; font-size: 16px; margin-bottom: 5px;">{{ __('messages.meeting_point') }}</h4>
                <p style="color: #555; margin-bottom: 0;">{{ $package->getTranslation('meeting_point') }}</p>
            </div>
            @endif

            <hr class="my-4" style="border-top: 1px dashed #ddd;">

            <!-- Jadwal & Itinerary -->
            @if($package->daily_schedule || $package->itinerary)
            <h3 class="mb-3" style="font-weight: 700; font-size: 20px;">{{ __('messages.itinerary') }}</h3>
            
            @if($package->daily_schedule)
            <div class="mb-4" style="color: #555; line-height: 1.8;">
                {!! $package->getTranslation('daily_schedule') !!}
            </div>
            @endif
 
            @if($package->itinerary)
            <div class="itinerary-box p-4" style="background-color: #fcfcfc; border: 1px solid #eee; border-radius: 12px; color: #555; line-height: 1.8;">
                {!! $package->getTranslation('itinerary') !!}
            </div>
            @endif
            <hr class="my-4" style="border-top: 1px dashed #ddd;">
            @endif

            <!-- Facilities -->
            <div class="row">
                @if($package->facilities_included)
                <div class="col-md-6 mb-4">
                    <h3 class="mb-3" style="font-weight: 700; font-size: 18px; color: #28a745;"><i class="icon-check-circle mr-2"></i>{{ __('messages.included') }}</h3>
                    <div style="color: #555; line-height: 1.8;">
                        {!! $package->getTranslation('facilities_included') !!}
                    </div>
                </div>
                @endif
                
                @if($package->facilities_excluded)
                <div class="col-md-6 mb-4">
                    <h3 class="mb-3" style="font-weight: 700; font-size: 18px; color: #dc3545;"><i class="icon-times-circle mr-2"></i>{{ __('messages.excluded') }}</h3>
                    <div style="color: #555; line-height: 1.8;">
                        {!! $package->getTranslation('facilities_excluded') !!}
                    </div>
                </div>
                @endif
            </div>

            @if($package->persyaratan)
            <hr class="my-4" style="border-top: 1px dashed #ddd;">
            <div class="mt-4">
                <h3 class="mb-3" style="font-weight: 700; font-size: 18px;"><i class="icon-info-circle mr-2" style="color: #ffc107;"></i>{{ __('messages.terms') }}</h3>
                <div style="color: #555; line-height: 1.8; font-size: 14px;">
                    {!! $package->getTranslation('persyaratan') !!}
                </div>
            </div>
            @endif

        </div>
      </div> <!-- .col-md-8 -->

      <!-- Kanan: Sidebar Harga & Booking -->
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box p-4 shadow-sm" style="background: #fff; border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); position: sticky; top: 100px;" x-data="{ priceType: 'local' }">
            <h3 style="font-size: 20px; font-weight: 800; margin-bottom: 20px; text-align: center; color: #222;">{{ __('messages.book_now') }}</h3>
            
            <!-- Price Type Toggle -->
            <div class="d-flex p-1 bg-light rounded mb-4" style="border: 1px solid #eee;">
                <button type="button" @click="priceType = 'local'" 
                    :class="priceType === 'local' ? 'bg-white shadow-sm text-primary' : 'text-muted'"
                    class="btn btn-sm flex-fill py-2 px-1 border-0" style="font-weight: 600; font-size: 11px; transition: all 0.3s;">
                    {{ __('messages.local_tourist') }}
                </button>
                <button type="button" @click="priceType = 'foreign'" 
                    :class="priceType === 'foreign' ? 'bg-white shadow-sm text-primary' : 'text-muted'"
                    class="btn btn-sm flex-fill py-2 px-1 border-0" style="font-weight: 600; font-size: 11px; transition: all 0.3s;">
                    {{ __('messages.foreign_tourist') }}
                </button>
            </div>

            <div class="price-breakdown mb-4">
                <!-- Local Prices -->
                <template x-if="priceType === 'local'">
                    <div>
                        @foreach([1,2,3,4,5,8,10] as $pax)
                            @if($package->{'price_'.$pax.'pax'})
                            <div class="d-flex justify-content-between mb-2 pb-2" style="border-bottom: 1px dashed #eee;">
                                <span style="color: #666;">{{ $pax }} Orang ({{ $pax }} Pax)</span>
                                <span style="font-weight: 700; color: #2188ff;">Rp {{ number_format($package->{'price_'.$pax.'pax'}, 0, ',', '.') }}</span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </template>

                <!-- Foreign Prices -->
                <template x-if="priceType === 'foreign'">
                    <div>
                        @foreach([1,2,3,4,5,8,10] as $pax)
                            @if($package->{'price_'.$pax.'pax_foreign'})
                            <div class="d-flex justify-content-between mb-2 pb-2" style="border-bottom: 1px dashed #eee;">
                                <span style="color: #666;">{{ $pax }} Person ({{ $pax }} Pax)</span>
                                <span style="font-weight: 700; color: #2188ff;">Rp {{ number_format($package->{'price_'.$pax.'pax_foreign'}, 0, ',', '.') }}</span>
                            </div>
                            @else
                                {{-- Fallback to local if foreign not set, or show notice --}}
                                @if($package->{'price_'.$pax.'pax'})
                                <div class="d-flex justify-content-between mb-2 pb-2" style="border-bottom: 1px dashed #eee;">
                                    <span style="color: #666;">{{ $pax }} Person ({{ $pax }} Pax)</span>
                                    <span style="font-weight: 700; color: #2188ff;">Rp {{ number_format($package->{'price_'.$pax.'pax'}, 0, ',', '.') }}</span>
                                </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </template>
            </div>

            <div class="form-group mb-0">
                <a href="#" class="btn btn-primary py-3 px-4 d-block w-100" style="border-radius: 30px; font-weight: 700; background-color: #2188ff; border: none; box-shadow: 0 4px 15px rgba(33, 136, 255, 0.4);">{{ __('messages.book_now') }}</a>
            </div>
            
            <p class="text-center mt-3" style="font-size: 12px; color: #999;">{{ __('messages.special_offer') }}</p>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- Related Packages -->
@if($relatedPackages->count() > 0)
<section class="ftco-section border-top">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4" style="font-weight: 800;">{{ __('messages.related_packages') }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($relatedPackages as $related)
                <div class="col-md-4 ftco-animate mb-4">
                    @include('paket.card', ['package' => $related])
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('styles')
<style>
    /* Styling khusus untuk konten hasil editor */
    .itinerary-box strong, .itinerary-box b,
    .ftco-section strong, .ftco-section b {
        font-weight: 900 !important;
        color: #000 !important;
    }
    
    .itinerary-box ul, .ftco-section ul {
        margin-bottom: 1.5rem;
    }
    
    .itinerary-box p, .ftco-section p {
        margin-bottom: 1rem;
    }
</style>
@endpush
