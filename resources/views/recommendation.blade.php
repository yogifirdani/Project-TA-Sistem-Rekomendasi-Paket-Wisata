@extends('template')
@section('content')

    <div class="hero-wrap" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 25%), url('{{ asset('images/background/jungle-island.webp') }}'); background-size: cover; background-position: center; height: 50vh; min-height: 400px;">
      <div class="overlay"></div>
      <div class="container" style="height: 100%;">
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 100%;" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <span class="mr-2"><a href="{{ lroute('home') }}">{{ __('messages.home') }}</a></span>
              <span>{{ __('messages.rec_page_title') }}</span>
            </p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              {{ __('messages.rec_page_heading') }}
            </h1>
          </div>
        </div>
      </div>
    </div>

    <style>
        @keyframes customPing {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.4); opacity: 0; }
        }
    </style>

    <section class="ftco-section bg-white">
      <div class="container">

        <!-- Maintenance Alert Card (Aesthetic Design) -->
        <div class="row justify-content-center py-5">
            <div class="col-md-8 col-lg-6 text-center">
                <div class="bg-white p-5 text-center transition-all duration-300" style="border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 20px 40px -15px rgba(87, 201, 209, 0.15); border-radius: 24px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                    <!-- Icon Area (Aesthetic stacked pulsing circle) -->
                    <div style="position: relative; width: 80px; height: 80px; margin: 0 auto 24px;">
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(87, 201, 209, 0.15); border-radius: 50%; animation: customPing 2s cubic-bezier(0, 0, 0.2, 1) infinite;"></div>
                        <div style="position: relative; width: 80px; height: 80px; background: rgba(87, 201, 209, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgb(87, 201, 209); font-size: 28px; border: 1px solid rgba(87, 201, 209, 0.2);">
                            <i class="fa fa-wrench"></i>
                        </div>
                    </div>
                    
                    @if(app()->getLocale() == 'en')
                        <h2 style="font-family: 'Poppins', sans-serif; font-size: 22px; font-weight: 700; color: #1e293b; margin-bottom: 12px; letter-spacing: -0.5px;">
                            Feature Under Maintenance
                        </h2>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #64748b; line-height: 1.6; margin-bottom: 24px; padding: 0 15px;">
                            Apologies, the recommendation page is currently under system maintenance. We will be back shortly!
                        </p>
                        <a href="{{ lroute('home') }}" class="btn text-white transition-all duration-300" style="background-color: rgb(87, 201, 209); box-shadow: 0 4px 15px rgba(87, 201, 209, 0.3); border-radius: 30px !important; border: none !important; font-size: 12px; padding: 8px 24px; font-weight: 600; display: inline-block;">
                            Back to Home
                        </a>
                    @else
                        <h2 style="font-family: 'Poppins', sans-serif; font-size: 22px; font-weight: 700; color: #1e293b; margin-bottom: 12px; letter-spacing: -0.5px;">
                            Fitur Dalam Perbaikan
                        </h2>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #64748b; line-height: 1.6; margin-bottom: 24px; padding: 0 15px;">
                            Mohon maaf, halaman rekomendasi saat ini sedang dalam perbaikan sistem. Kami akan segera kembali!
                        </p>
                        <a href="{{ lroute('home') }}" class="btn text-white transition-all duration-300" style="background-color: rgb(87, 201, 209); box-shadow: 0 4px 15px rgba(87, 201, 209, 0.3); border-radius: 30px !important; border: none !important; font-size: 12px; padding: 8px 24px; font-weight: 600; display: inline-block;">
                            Kembali ke Beranda
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{--
        <!-- Form Pencarian Rekomendasi (HIDDEN FOR MAINTENANCE) -->
        <div class="row justify-content-center mb-5 pb-3 mt-4">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" style="font-weight: 800; color: #000; font-size: 32px;">
              {{ __('messages.rec_main_heading') }}
            </h2>
          </div>
        </div>

        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 col-lg-6 ftco-animate">
                <form action="#" method="POST" class="p-4 p-md-0" style="background: transparent;">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="budget" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                          {{ __('messages.rec_label_budget') }}
                        </label>
                        <input type="text" id="budget" name="budget" class="form-control"
                               placeholder="{{ __('messages.rec_placeholder_budget') }}"
                               style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kategori" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                          {{ __('messages.rec_label_category') }}
                        </label>
                        <input type="text" id="kategori" name="kategori" class="form-control"
                               placeholder="{{ __('messages.rec_placeholder_category') }}"
                               style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="fasilitas" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                          {{ __('messages.rec_label_facility') }}
                        </label>
                        <input type="text" id="fasilitas" name="fasilitas" class="form-control"
                               placeholder="{{ __('messages.rec_placeholder_facility') }}"
                               style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mb-5">
                        <label for="durasi" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                          {{ __('messages.rec_label_duration') }}
                        </label>
                        <input type="text" id="durasi" name="durasi" class="form-control"
                               placeholder="{{ __('messages.rec_placeholder_duration') }}"
                               style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff;" required>
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <button type="submit" class="btn w-100"
                                style="background-color: #000; color: #fff; border-radius: 6px; font-weight: 700; height: 55px; font-size: 15px; border: none;">
                          {{ __('messages.rec_btn_search') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hasil Rekomendasi -->
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" style="font-weight: 700;">{{ __('messages.rec_results_heading') }}</h2>
          </div>
        </div>

        <div class="row d-flex">
          <!-- Card 1 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>
          <!-- Card 2 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>
          <!-- Card 3 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>
          <!-- Card 4 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>
          <!-- Card 5 -->
          <div class="col-sm-6 col-md-4 ftco-animate mb-4">
            @include('paket.card')
          </div>
        </div>
        --}}

      </div>
    </section>

@endsection
