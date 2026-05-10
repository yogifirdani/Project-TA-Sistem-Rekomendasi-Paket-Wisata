@extends('template')

@section('content')
<div class="min-h-screen relative flex items-center justify-center py-12 px-4 font-outfit overflow-hidden pt-25">
    <!-- Background Image from Theme URL -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background/jungle-island.webp') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]"></div>
    </div>

    <div class="container mx-auto max-w-4xl relative z-10">
        


        <!-- Main Glass Card - Smaller & Compact -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl rounded-[2rem] overflow-hidden flex flex-col md:flex-row mx-auto">
            
            <!-- Left Sidebar - Narrower -->
            <aside class="w-full md:w-64 bg-white/5 border-r border-white/10 p-6 flex flex-col items-center">
                <div class="relative mb-4">
                    <div class="w-20 h-20 bg-gradient-to-tr from-[#57c9d1] to-[#3ca7af] rounded-2xl flex items-center justify-center text-white text-4xl font-bold shadow-xl transform rotate-2 hover:rotate-0 transition-all duration-500">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-2 border-[#2d3a3a] rounded-full"></div>
                </div>
                
                <h2 class="text-lg font-bold text-white mb-0.5 text-center px-2">{{ $user->name }}</h2>
                <p class="text-white/50 text-[10px] mb-6 uppercase tracking-widest">Premium Member</p>

                <nav class="w-full space-y-2">
                    <button id="tab-akun" onclick="showTab('akun')" class="w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 bg-[#57c9d1] text-white shadow-lg shadow-[#57c9d1]/40">
                        <i class="ion-ios-person text-lg"></i>
                        <span class="text-xs font-semibold">Akun Saya</span>
                    </button>
                    <button id="tab-pesanan" onclick="showTab('pesanan')" class="w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 text-white/60 hover:bg-white/5 hover:text-white">
                        <i class="ion-ios-list-box text-lg"></i>
                        <span class="text-xs font-semibold">Pemesanan Saya</span>
                    </button>
                    <div class="h-px bg-white/5 my-3 mx-4"></div>
                    <form action="{{ route('logout') }}" method="POST" class="hidden" id="profile-logout-form">@csrf</form>
                    <button onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();" class="w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 text-red-400 hover:bg-red-500/10">
                        <i class="ion-ios-log-out text-lg"></i>
                        <span class="text-xs font-semibold">Logout</span>
                    </button>
                </nav>
            </aside>

            <!-- Right Content Area - More Compact -->
            <main class="flex-1 p-6 md:p-10 relative">
                
                <!-- Alerts Inside Content Area -->
                @if (session('success'))
                <div id="success-alert" class="absolute top-6 right-6 md:top-10 md:right-10 bg-green-500/20 border border-green-500/50 text-green-400 px-4 py-2 rounded-xl shadow-xl animate-fadeIn transition-all duration-500 z-50 flex items-center gap-2">
                    <i class="ion-ios-checkmark-circle text-lg"></i>
                    <span class="text-xs font-bold">{{ session('success') }}</span>
                </div>
                @endif

                <!-- Tab: Akun Saya -->
                <div id="content-akun" class="space-y-8 animate-fadeIn">
                    <div class="mb-8 border-b border-white/5 pb-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-3">
                            <span class="w-1 h-6 bg-[#57c9d1] rounded-full shadow-[0_0_10px_#57c9d1]"></span>
                            Informasi Akun
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 gap-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="group">
                                <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">Username</label>
                                <div class="bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium group-hover:border-[#57c9d1]/40 transition-colors shadow-inner">
                                    {{ $user->name }}
                                </div>
                            </div>

                            <div class="group">
                                <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">Nama Lengkap</label>
                                <div class="bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium group-hover:border-[#57c9d1]/40 transition-colors shadow-inner">
                                    {{ $user->name }}
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">Email Terdaftar</label>
                            <div class="bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium group-hover:border-[#57c9d1]/40 transition-colors shadow-inner">
                                {{ $user->email }}
                            </div>
                        </div>

                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">No Telepon</label>
                            <div class="bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium group-hover:border-[#57c9d1]/40 transition-colors shadow-inner">
                                {{ $user->phone ?? 'Belum ditambahkan' }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-wrap gap-3">
                        <a href="{{ route('profile.edit') }}" class="bg-[#57c9d1] hover:bg-[#46aeb5] text-white text-sm font-bold py-3 px-8 rounded-xl shadow-lg shadow-[#57c9d1]/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            Edit Profil
                        </a>
                        <a href="{{ route('profile.edit') }}" class="bg-white/5 hover:bg-white/10 text-white text-sm font-bold py-3 px-8 rounded-xl border border-white/10 transition-all duration-300 inline-block">
                            Ubah Password
                        </a>
                    </div>
                </div>

                <!-- Tab: Pemesanan Saya -->
                <div id="content-pesanan" class="hidden space-y-8 animate-fadeIn">
                    <div class="mb-8 border-b border-white/5 pb-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-3">
                            <span class="w-1 h-6 bg-[#57c9d1] rounded-full shadow-[0_0_10px_#57c9d1]"></span>
                            Riwayat Pemesanan
                        </h3>
                    </div>

                    <div class="space-y-4">
                        @forelse($bookings as $booking)
                        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 hover:border-[#57c9d1]/30 transition-all duration-300">
                            <div class="flex flex-col md:flex-row justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-[10px] font-bold text-[#57c9d1] uppercase tracking-tighter bg-[#57c9d1]/10 px-2 py-0.5 rounded-md">#{{ $booking->booking_code }}</span>
                                        <span class="text-white/30 text-[10px]">&bull; {{ $booking->booking_date->format('d M Y') }}</span>
                                    </div>
                                    <h4 class="text-white font-bold text-sm">{{ $booking->tourPackage->package_name ?? 'Paket Wisata' }}</h4>
                                    <p class="text-white/40 text-[10px] mt-1 flex items-center gap-1">
                                        <i class="ion-ios-calendar"></i> Jadwal: {{ $booking->trip_date->format('d M Y') }}
                                    </p>
                                </div>
                                <div class="flex flex-row md:flex-col justify-between md:items-end gap-2">
                                    <span class="text-white font-bold text-sm">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $booking->booking_status == 'confirmed' ? 'bg-green-500/10 text-green-400' : 'bg-yellow-500/10 text-yellow-400' }}">
                                        {{ $booking->booking_status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12 bg-white/5 rounded-3xl border border-dashed border-white/10">
                            <i class="ion-ios-paper text-4xl text-white/20 mb-3 block"></i>
                            <p class="text-white/40 text-sm">Belum ada pemesanan yang tercatat.</p>
                            <a href="/" class="text-[#57c9d1] text-xs font-bold mt-4 inline-block hover:underline">Jelajahi Paket Wisata</a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Footer Info -->
        <p class="text-center text-white/20 text-[10px] mt-6 tracking-wide">
            Platform Wisata Digital &bull; Kutamasya.id
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-hide success alert after 5 seconds
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.opacity = '0';
                successAlert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    successAlert.remove();
                }, 500);
            }, 5000);
        }
    });

    function showTab(tabId) {
        // Hide all tabs
        document.getElementById('content-akun').classList.add('hidden');
        document.getElementById('content-pesanan').classList.add('hidden');
        
        // Show target tab
        document.getElementById('content-' + tabId).classList.remove('hidden');
        
        // Update active state in sidebar buttons
        const btnAkun = document.getElementById('tab-akun');
        const btnPesanan = document.getElementById('tab-pesanan');
        
        if (tabId === 'akun') {
            btnAkun.className = "w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 bg-[#57c9d1] text-white shadow-lg shadow-[#57c9d1]/40";
            btnPesanan.className = "w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 text-white/60 hover:bg-white/5 hover:text-white";
        } else {
            btnPesanan.className = "w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 bg-[#57c9d1] text-white shadow-lg shadow-[#57c9d1]/40";
            btnAkun.className = "w-full flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 text-white/60 hover:bg-white/5 hover:text-white";
        }
    }
</script>

<style>
    .backdrop-blur-md {
        -webkit-backdrop-filter: blur(8px);
    }
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
