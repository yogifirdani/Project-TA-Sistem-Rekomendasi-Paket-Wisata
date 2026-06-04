@extends('template')

@section('content')

@push('styles')
<style>
    /* Paksa semua menu navbar menjadi tebal di halaman ini (baik saat scroll maupun tidak) */
    #ftco-navbar .nav-link,
    #ftco-navbar .dropdown-item,
    #ftco-navbar .cta .nav-link span {
        font-weight: 700 !important;
    }

    /* Ubah warna teks navbar menjadi hitam di halaman checkout (sebelum di-scroll) agar terlihat di background putih */
    #ftco-navbar:not(.scrolled) .nav-link,
    #ftco-navbar:not(.scrolled) .dropdown-item {
        color: #222222 !important;
    }
    /* Warna saat menu aktif atau di-hover menjadi warna brand (baik scroll maupun tidak) */
    #ftco-navbar .nav-item.active .nav-link,
    #ftco-navbar .nav-link:hover {
        color: rgb(87, 201, 209) !important;
    }
    /* Ikon panah bawah (dropdown) */
    #ftco-navbar .nav-link i {
        color: inherit !important;
    }
    /* Ikon Menu (hamburger di mobile) */
    #ftco-navbar:not(.scrolled) .navbar-toggler {
        color: #222222 !important;
    }
</style>
@endpush

<section class="bg-light pb-5" style="padding-top: 90px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white p-5 shadow-sm text-center" style="border-radius: 16px; border: 1px solid rgba(0,0,0,0.05);">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 80px; color: rgb(87, 201, 209);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    
                    <h2 class="mb-3" style="font-weight: 800;">{{ __('messages.order_created_success') }}</h2>
                    <p style="color: #666; font-size: 16px;">{{ __('messages.your_order_code') }} <strong>{{ $booking->booking_code }}</strong></p>
                    
                    <div class="bg-light p-4 mt-4 mb-4 text-left" style="border-radius: 12px; border: 1px dashed #ccc;">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <span style="color: #777; font-size: 14px;">{{ __('messages.package_name') }}</span><br>
                                <strong>{{ $booking->tourPackage->getTranslation('package_name') }}</strong>
                            </div>
                            <div class="col-6 mb-2">
                                <span style="color: #777; font-size: 14px;">{{ __('messages.trip_date_label') }}</span><br>
                                <strong>{{ \Carbon\Carbon::parse($booking->trip_date)->translatedFormat('d F Y') }}</strong>
                            </div>
                            <div class="col-6">
                                <span style="color: #777; font-size: 14px;">{{ __('messages.num_participants_pax') }}</span><br>
                                <strong>{{ trans_choice('messages.pax_count', $booking->num_participants, ['count' => $booking->num_participants]) }}</strong>
                            </div>
                            <div class="col-6">
                                <span style="color: #777; font-size: 14px;">{{ __('messages.total_bill_label') }}</span><br>
                                <strong style="color: rgb(87, 201, 209); font-size: 18px;">Rp {{ number_format($booking->dp_amount > 0 ? $booking->dp_amount : $booking->total_price, 0, ',', '.') }}</strong>
                                @if($booking->dp_amount > 0)
                                <br><small class="text-muted">({{ __('messages.dp_payment_note') }})</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="mb-4 text-muted">{{ __('messages.complete_payment_instruction') }}</p>

                    <button id="pay-button" class="btn btn-primary py-3 px-5" style="border-radius: 30px; font-weight: 700; background-color: rgb(87, 201, 209); border: none; box-shadow: 0 4px 15px rgba(87, 201, 209, 0.4); font-size: 18px;">
                        {{ __('messages.pay_now_btn') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<!-- Midtrans Snap Script -->
<script src="{{ config('midtrans.isProduction') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('{{ $booking->snap_token }}', {
            // Optional
            onSuccess: function(result){
                // Arahkan ke endpoint success untuk update status lokal
                window.location.href = "{{ route('checkout.success', ['locale' => app()->getLocale(), 'booking' => $booking->booking_code]) }}";
            },
            // Optional
            onPending: function(result){
                /* You may add your own js here, this is just example */
                alert("{{ __('messages.waiting_payment_alert') }}");
            },
            // Optional
            onError: function(result){
                /* You may add your own js here, this is just example */
                alert("{{ __('messages.payment_failed_alert') }}");
            }
        });
    };
</script>
@endpush
