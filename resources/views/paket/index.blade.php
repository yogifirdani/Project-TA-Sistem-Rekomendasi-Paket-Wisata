@extends('template')

@section('content')

<!-- Hero Section -->
<div class="hero-wrap" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 25%), url('{{ asset('images/background/jungle-island.webp') }}'); background-size: cover; background-position: center; height: 60vh; min-height: 400px;">
  <div class="overlay"></div>
  <div class="container" style="height: 100%;">
    <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: 100%;" data-scrollax-parent="true">
      <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ url('/') }}">{{ __('messages.home') }}</a></span> <span>{{ __('messages.tour_packages') }}</span></p>
        <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="color: #fff; font-weight: 700;">
            {{ $selectedType ? $selectedType->getTranslation('type_name') : __('messages.all_packages') }}
        </h1>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<section class="ftco-section bg-light">
  <div class="container">
    
    <!-- Filter Dropdown
    <div class="row justify-content-center mb-5 pb-3" style="position: relative; z-index: 99;">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2 class="mb-4">{{ __('messages.filter_tour') }}</h2>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px 30px; border-radius: 30px; font-size: 16px; background-color: #2188ff; border-color: #2188ff;">
            {{ $selectedType ? $selectedType->getTranslation('type_name') : __('messages.choose_type') }}
          </button>
          <div class="dropdown-menu shadow-lg border-0" aria-labelledby="filterDropdown" style="z-index: 9999; border-radius: 15px; margin-top: 10px; min-width: 250px; left: 50%; transform: translateX(-50%);">
            <a class="dropdown-item py-3 {{ !$selectedType ? 'active' : '' }}" href="{{ route('paket-wisata') }}" style="font-weight: 600;">{{ __('messages.all_packages') }}</a>
            @foreach($packageTypes as $type)
              <a class="dropdown-item py-3 {{ ($selectedType && $selectedType->id == $type->id) ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => $type->slug]) }}" style="font-weight: 500;">{{ $type->getTranslation('type_name') }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div> -->

    <!-- Package Grid -->
    <div class="row">
      @forelse($packages as $package)
        <div class="col-md-4 ftco-animate mb-4">
          @include('paket.card', ['package' => $package])
        </div>
      @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-info" style="border-radius: 15px;">
                {{ __('messages.no_packages_found') }}
            </div>
        </div>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          {{ $packages->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
    
  </div>
</section>

@endsection
