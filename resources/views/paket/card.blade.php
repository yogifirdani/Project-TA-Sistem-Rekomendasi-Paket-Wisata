@props(['package' => null])

<div class="destination d-flex flex-column h-100" style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05); background: #fff; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.05)';">
    <a href="{{ isset($package) && $package->slug ? route('paket-wisata.show', $package->slug) : '#' }}" class="img img-2 d-block" style="height: 180px; position: relative; overflow: hidden;">
        <img src="{{ isset($package) && $package->image_path ? asset('storage/' . $package->image_path) : asset('images/background/jungle-island.webp') }}" 
             alt="{{ isset($package) ? $package->getTranslation('package_name') : 'Tour Package' }}" 
             style="width: 100%; height: 100%; object-fit: cover;" 
             loading="lazy" 
             width="350" 
             height="180">
        <div class="icon d-flex justify-content-center align-items-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <span class="icon-search2"></span>
        </div>
    </a>
    <div class="text p-3 d-flex flex-column flex-grow-1">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <div class="one" style="width: calc(100% - 100px); padding-right: 10px;">
                <h3 style="font-size: 16px; line-height: 1.3; font-weight: 700; margin-bottom: 5px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><a href="{{ isset($package) && $package->slug ? route('paket-wisata.show', $package->slug) : '#' }}" style="color: #222;">{{ isset($package) ? $package->getTranslation('package_name') : 'Tour Package' }}</a></h3>
            </div>
            <div class="two" style="width: 100px; text-align: right;">
                <span class="price" style="font-size: 15px; font-weight: 700; color: #2188ff; white-space: nowrap;">Rp {{ number_format($package->price_1pax ?? 0, 0, ',', '.') }}</span>
            </div>
        </div>
        
        <p style="font-size: 13px; color: #666; line-height: 1.5; margin-bottom: 10px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; flex-grow: 1;">{{ Str::limit(isset($package) ? $package->getTranslation('description') : 'Package description', 80) }}</p>
        
        <div class="mt-auto">
            <p class="days mb-1" style="font-size: 13px; color: #555; font-weight: 500;"><span><i class="icon-clock-o mr-2" style="color: #2188ff;"></i>{{ $package->duration ?? '1 Day' }}</span></p>
            <hr style="margin: 8px 0; border-top: 1px solid #eee;">
            <p class="bottom-area d-flex align-items-center mb-0">
                <span style="font-size: 13px; color: #555;"><i class="icon-map-o mr-2" style="color: #2188ff;"></i>{{ $package->city ?? 'Location' }}</span> 
                <span class="ml-auto"><a href="{{ isset($package) && $package->slug ? route('paket-wisata.show', $package->slug) : '#' }}" class="btn btn-sm" style="background-color: #2188ff; color: #fff; border-radius: 20px; padding: 4px 14px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(33, 136, 255, 0.3);">Detail</a></span>
            </p>
        </div>
    </div>
</div>
