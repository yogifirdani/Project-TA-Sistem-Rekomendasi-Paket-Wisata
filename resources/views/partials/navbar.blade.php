<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar" style="z-index: 9999 !important;">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}" style="padding: 5px 0;">
        <img src="{{ asset('asset/images/Logo-kutamasya.webp') }}" 
             alt="Kutamasya Logo" 
             style="height: 50px; width: auto; border-radius: 5px;" 
             width="150" 
             height="50">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> 
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <!-- Menu Utama di Tengah -->
        <ul class="navbar-nav mx-auto center-nav">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">{{ __('messages.home') }}</a></li>          
          <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">{{ __('messages.about') }}</a></li>
          <li class="nav-item dropdown {{ request()->routeIs('paket-wisata') ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownPaketWisata" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ __('messages.tour_packages') }} <i class="ion-ios-arrow-down" style="font-size: 12px; margin-left: 5px;"></i>
            </a>
            
            <div class="dropdown-menu" aria-labelledby="dropdownPaketWisata">
              @if(isset($globalPackageTypes))
                @foreach($globalPackageTypes as $type)
                  <a class="dropdown-item {{ request()->query('tipe') == $type->slug ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => $type->slug]) }}"><span>{{ $type->getTranslation('type_name') }}</span></a>
                @endforeach
              @else
                <!-- Fallback if View Composer fails or is missing -->
                <a class="dropdown-item {{ request()->query('tipe') == 'open-trip-banyuwangi' ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => 'open-trip-banyuwangi']) }}"><span>Open Trip Banyuwangi</span></a>
                <a class="dropdown-item {{ request()->query('tipe') == 'one-day-trip-banyuwangi' ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => 'one-day-trip-banyuwangi']) }}"><span>One Day Trip Banyuwangi</span></a>
                <a class="dropdown-item {{ request()->query('tipe') == '2-day-1-night-banyuwangi' ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => '2-day-1-night-banyuwangi']) }}"><span>2 Day 1 Night Banyuwangi</span></a>
                <a class="dropdown-item {{ request()->query('tipe') == '3-day-2-night-banyuwangi' ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => '3-day-2-night-banyuwangi']) }}"><span>3 Day 2 Night Banyuwangi</span></a>
                <a class="dropdown-item {{ request()->query('tipe') == '4-day-3-night-banyuwangi' ? 'active' : '' }}" href="{{ route('paket-wisata', ['tipe' => '4-day-3-night-banyuwangi']) }}"><span>4 Day 3 Night Banyuwangi</span></a>
              @endif
            </div>
          </li>
          <li class="nav-item {{ request()->routeIs('recommendation') ? 'active' : '' }}"><a href="{{ route('recommendation') }}" class="nav-link">{{ __('messages.recommendation') }}</a></li>
          <li class="nav-item {{ request()->routeIs('article') ? 'active' : '' }}"><a href="{{ route('article') }}" class="nav-link">{{ __('messages.article') }}</a></li>
          <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">{{ __('messages.contact') }}</a></li>
        </ul>

        <!-- Tombol Auth & Lang di Kanan -->
        <ul class="navbar-nav ml-auto align-items-center">
          <!-- Language Switcher Toggle Switch -->
          <li class="nav-item d-flex align-items-center mr-lg-3">
            <a href="{{ route('lang.switch', App::getLocale() == 'id' ? 'en' : 'id') }}" 
               class="d-inline-flex align-items-center" 
               style="text-decoration: none;"
               title="{{ App::getLocale() == 'id' ? 'Switch to English' : 'Ganti ke Bahasa Indonesia' }}">
                <div class="position-relative d-flex align-items-center shadow-sm" 
                     style="width: 58px; height: 30px; background: {{ App::getLocale() == 'en' ? 'rgb(87, 201, 209)' : '#dee2e6' }}; border-radius: 30px; transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); padding: 3px; cursor: pointer; border: 1px solid rgba(0,0,0,0.05);">
                    
                    <!-- Track Text -->
                    <div class="w-100 d-flex justify-content-between align-items-center px-2" 
                         style="font-size: 9px; font-weight: 800; color: {{ App::getLocale() == 'en' ? 'rgba(255,255,255,0.9)' : '#888' }}; user-select: none;">
                        <span style="visibility: {{ App::getLocale() == 'en' ? 'visible' : 'hidden' }};">EN</span>
                        <span style="visibility: {{ App::getLocale() == 'id' ? 'visible' : 'hidden' }};">ID</span>
                    </div>

                    <!-- Toggle Knob -->
                    <div class="d-flex align-items-center justify-content-center shadow-sm" 
                         style="width: 24px; height: 24px; background: white; border-radius: 50%; position: absolute; left: {{ App::getLocale() == 'id' ? '3px' : '31px' }}; transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
                        @if(App::getLocale() == 'id')
                            <img src="https://flagcdn.com/w40/id.png" style="width: 16px; height: auto; border-radius: 2px;" alt="ID">
                        @else
                            <img src="https://flagcdn.com/w40/gb.png" style="width: 16px; height: auto; border-radius: 2px;" alt="EN">
                        @endif
                    </div>
                </div>
            </a>
          </li>

          @if (Route::has('login'))
            @auth
              @if(Auth::user()->role === 'admin')
                <li class="nav-item cta"><a href="{{ route('admin.dashboard') }}" class="nav-link"><span>{{ __('messages.admin_panel') }}</span></a></li>
              @else
                <li class="nav-item d-flex align-items-center">
                  <a href="{{ url('/profile') }}" class="nav-link" title="{{ Auth::user()->name }}" style="padding:0; line-height:1;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                      <circle cx="12" cy="8" r="4"/>
                      <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg>
                  </a>
                </li>
              @endif
            @else
              <li class="nav-item"><a href="/login" class="nav-link">{{ __('messages.login') }}</a></li>
              @if (Route::has('register'))
                <li class="nav-item cta"><a href="/register" class="nav-link"><span>{{ __('messages.register') }}</span></a></li>
              @endif
            @endauth
          @endif
        </ul>
      </div>
    </div>
</nav>
