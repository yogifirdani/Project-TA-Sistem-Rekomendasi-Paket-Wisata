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

    <section class="ftco-section bg-white">
      <div class="container">

        <!-- Notification Alerts -->
        @if(session('error'))
            <div class="row justify-content-center mb-4">
                <div class="col-md-7 col-lg-6">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; font-size: 14px;">
                        <i class="fa fa-exclamation-triangle mr-2"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Pencarian Rekomendasi -->
        <div class="row justify-content-center mb-4 mt-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4" style="font-weight: 800; color: #000; font-size: 32px;">
              {{ __('messages.rec_main_heading') }}
            </h2>
          </div>
        </div>

        <div class="row justify-content-center mb-5 pb-4">
            <div class="col-md-7 col-lg-6 ftco-animate">
                <div class="p-4 p-md-5" style="border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 15px 35px rgba(0,0,0,0.05); border-radius: 16px; background: #fff;">
                    <form action="{{ lroute('recommendation.post') }}" method="POST" style="background: transparent;">
                        @csrf
                        
                        <!-- Budget -->
                        <div class="form-group mb-4">
                            <label for="budget" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                              {{ __('messages.rec_label_budget') }} (IDR)
                            </label>
                            <input type="number" id="budget" name="budget" class="form-control @error('budget') is-invalid @enderror"
                                   value="{{ old('budget', isset($preference) ? $preference->budget : '') }}"
                                   placeholder="{{ __('messages.rec_placeholder_budget') }}"
                                   style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff; padding-left: 15px;" required min="0">
                            @error('budget')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori Wisata -->
                        <div class="form-group mb-4">
                            <label for="category_id" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                              {{ __('messages.rec_label_category') }}
                            </label>
                            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" 
                                    style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff; padding-left: 15px;" required>
                                <option value="">-- {{ app()->getLocale() == 'en' ? 'Select Category' : 'Pilih Kategori' }} --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', isset($preference) ? $preference->category_id : '') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->getTranslation('category_name') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fasilitas Yang Diinginkan -->
                        <div class="form-group mb-4">
                            <label for="facilities" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                              {{ __('messages.rec_label_facility') }}
                            </label>
                            <input type="text" id="facilities" name="facilities" class="form-control @error('facilities') is-invalid @enderror"
                                   value="{{ old('facilities', isset($preference) ? $preference->preferred_facilities : '') }}"
                                   placeholder="{{ __('messages.rec_placeholder_facility') }}"
                                   style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff; padding-left: 15px;" required>
                            @error('facilities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Durasi Perjalanan -->
                        <div class="form-group mb-5">
                            <label for="duration" style="font-weight: 700; color: #000; font-size: 13px; margin-bottom: 8px; display: block;">
                              {{ __('messages.rec_label_duration') }}
                            </label>
                            <input type="text" id="duration" name="duration" class="form-control @error('duration') is-invalid @enderror"
                                   value="{{ old('duration', isset($preference) ? $preference->preferred_duration : '') }}"
                                   placeholder="{{ __('messages.rec_placeholder_duration') }}"
                                   style="border-radius: 6px; font-size: 14px; height: 50px !important; border: 1px solid #ccc; background: #fff; padding-left: 15px;" required>
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn w-100 transition-all duration-300"
                                    style="background-color: rgb(87, 201, 209); color: #fff; border-radius: 6px; font-weight: 700; height: 55px; font-size: 15px; border: none; box-shadow: 0 4px 15px rgba(87, 201, 209, 0.3);">
                              <i class="fa fa-search mr-2"></i> {{ __('messages.rec_btn_search') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Hasil Rekomendasi -->
        @if(isset($packages))
            <hr class="my-5" style="border-top: 1px solid rgba(0,0,0,0.06);">
            
            <div class="row justify-content-center mb-5 pb-3">
              <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-2" style="font-weight: 800; color: #000; font-size: 30px;">
                  {{ __('messages.rec_results_heading') }}
                </h2>
                <p style="font-size: 14px; color: #777;">
                  {{ app()->getLocale() == 'en' 
                     ? 'Based on your preferences, here are the top matching tour packages found by our AI recommender:' 
                     : 'Berdasarkan preferensi Anda, berikut adalah paket wisata paling cocok yang ditemukan oleh AI rekomendasi kami:' }}
                </p>
              </div>
            </div>

            @if($packages->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center py-4">
                        <div style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;">
                            <i class="fa fa-folder-open-o"></i>
                        </div>
                        <h4 style="font-weight: 600; color: #475569;">
                            {{ app()->getLocale() == 'en' ? 'No recommendations found' : 'Tidak ada rekomendasi yang ditemukan' }}
                        </h4>
                        <p style="color: #64748b; font-size: 14px;">
                            {{ app()->getLocale() == 'en' 
                               ? 'Try adjusting your search filters or budget limit to discover more tour packages.' 
                               : 'Coba sesuaikan filter pencarian atau batas budget Anda untuk menemukan lebih banyak paket wisata.' }}
                        </p>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach($packages as $package)
                        <div class="col-sm-6 col-md-4 ftco-animate mb-4 d-flex align-items-stretch">
                            @include('paket.card', ['package' => $package])
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

      </div>
    </section>

@endsection
