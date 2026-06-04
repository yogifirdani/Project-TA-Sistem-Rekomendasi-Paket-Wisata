@extends('template')

@section('content')
<div class="min-h-screen relative flex items-center justify-center py-12 px-4 font-outfit overflow-hidden pt-25">
    <!-- Background Image from Theme URL -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/background/jungle-island.webp') }}" class="w-full h-full object-cover" alt="Background">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[1px]"></div>
    </div>

    <div class="container mx-auto max-w-4xl relative z-10">
        
        <!-- Alerts -->
        @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500/50 text-red-500 px-6 py-4 rounded-2xl mb-6 shadow-xl animate-fadeIn">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif



        <!-- Main Glass Card -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl rounded-[2rem] overflow-hidden flex flex-col md:flex-row mx-auto">
            
            <!-- Left Sidebar -->
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
                    <a href="{{ lroute('profile') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl transition-all duration-300 text-white/60 hover:bg-white/5 hover:text-white">
                        <i class="ion-ios-arrow-back text-lg"></i>
                        <span class="text-xs font-semibold">{{ __('messages.profile_back_to_profile') }}</span>
                    </a>
                </nav>
            </aside>

            <!-- Right Content Area -->
            <main class="flex-1 p-6 md:p-10 relative">
                
                @if (session('success'))
                <div id="success-alert" class="absolute top-6 right-6 md:top-10 md:right-10 bg-green-500/20 border border-green-500/50 text-green-400 px-4 py-2 rounded-xl shadow-xl animate-fadeIn transition-all duration-500 z-50 flex items-center gap-2">
                    <i class="ion-ios-checkmark-circle text-lg"></i>
                    <span class="text-xs font-bold">{{ session('success') }}</span>
                </div>
                @endif

                <div class="mb-8 border-b border-white/5 pb-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-3">
                        <span class="w-1 h-6 bg-[#57c9d1] rounded-full shadow-[0_0_10px_#57c9d1]"></span>
                        {{ __('messages.profile_edit_account_info') }}
                    </h3>
                </div>

                <form action="{{ lroute('profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_username_label') }}</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-[#57c9d1]/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                        </div>

                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_phone_label') }}</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="{{ __('messages.phone_placeholder') }}"
                                class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-[#57c9d1]/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                        </div>
                    </div>

                    <div class="group">
                        <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_email_label') }}</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-[#57c9d1]/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-[#57c9d1] hover:bg-[#46aeb5] text-white text-sm font-bold py-3 px-8 rounded-xl shadow-lg shadow-[#57c9d1]/20 transition-all duration-300 transform hover:-translate-y-0.5">
                            {{ __('messages.profile_save_changes') }}
                        </button>
                    </div>
                </form>

                <div class="mt-12 mb-8 border-b border-white/5 pb-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-3">
                        <span class="w-1 h-6 bg-yellow-400 rounded-full shadow-[0_0_10px_#facc15]"></span>
                        {{ __('messages.profile_change_password_title') }}
                    </h3>
                </div>

                <form action="{{ lroute('profile.password') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="group">
                        <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_current_password') }}</label>
                        <input type="password" name="current_password" required placeholder="{{ __('messages.current_password_placeholder') }}"
                            class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-yellow-400/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_new_password') }}</label>
                            <input type="password" name="password" required placeholder="{{ __('messages.new_password_placeholder') }}"
                                class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-yellow-400/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                        </div>

                        <div class="group">
                            <label class="text-white/40 text-[10px] font-bold uppercase tracking-wider mb-1.5 block ml-1">{{ __('messages.profile_confirm_password') }}</label>
                            <input type="password" name="password_confirmation" required placeholder="{{ __('messages.confirm_password_placeholder') }}"
                                class="w-full bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-sm font-medium focus:outline-none focus:border-yellow-400/60 focus:bg-white/10 transition-all shadow-inner placeholder-white/20">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-yellow-400/20 hover:bg-yellow-400/30 text-yellow-400 border border-yellow-400/50 text-sm font-bold py-3 px-8 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5">
                            {{ __('messages.profile_update_password_btn') }}
                        </button>
                    </div>
                </form>

            </main>
        </div>
        
        <!-- Footer Info -->
        <p class="text-center text-white/20 text-[10px] mt-6 tracking-wide">
            {{ __('messages.profile_footer') }}
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
</script>

@push('styles')
@vite(['resources/css/app.css', 'resources/js/app.js'])
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
@endpush
@endsection
