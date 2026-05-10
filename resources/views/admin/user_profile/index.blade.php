@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Page Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white/90">Manajemen Pengguna</h1>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Daftar pelanggan yang terdaftar</p>
        </div>
        <div class="flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 dark:border-gray-800 dark:bg-white/[0.03]">
            <span class="text-sm text-gray-500 dark:text-gray-400">Total Pengguna:</span>
            <span class="text-sm font-semibold text-brand-600 dark:text-brand-400">{{ $users->total() }}</span>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="flex items-center gap-3 rounded-lg border border-success-300 bg-success-50 px-4 py-3 text-sm text-success-700 dark:border-success-700 dark:bg-success-500/15 dark:text-success-400">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Search Bar -->
    <div class="mb-5">
        <form method="GET" action="{{ route('admin.user-profile.index') }}" class="flex flex-wrap items-center gap-2">
            <div class="relative flex-1 min-w-[200px] sm:max-w-sm">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z"/>
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari nama atau email..."
                    class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-white dark:bg-gray-900 pl-10 pr-4 py-2 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30" />
            </div>
            <button type="submit"
                class="inline-flex items-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600 transition-colors">
                Cari
            </button>
            <a href="{{ route('admin.user-profile.index') }}"
                class="reset-search {{ request('search') ? '' : 'hidden' }} inline-flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 transition-colors">
                Reset
            </a>
        </form>
    </div>

    <!-- Table Card -->
    <div id="table-container" class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        @include('admin.user_profile._table')
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableContainer = document.getElementById('table-container');
        const searchInput = document.querySelector('input[name="search"]');
        const searchForm = searchInput.closest('form');
        let searchTimeout;

        // Function to fetch and update table
        async function updateTable(url) {
            // Add loading state
            tableContainer.style.opacity = '0.5';
            tableContainer.style.pointerEvents = 'none';

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const html = await response.text();
                tableContainer.innerHTML = html;
                
                // Update URL in browser without reload
                window.history.pushState({}, '', url);

                // Update Reset button visibility after search
                const resetBtn = document.querySelector('.reset-search');
                const searchVal = new URL(url).searchParams.get('search');
                if (searchVal && searchVal.trim() !== '') {
                    resetBtn.classList.remove('hidden');
                } else {
                    resetBtn.classList.add('hidden');
                }
            } catch (error) {
                console.error('Error fetching table:', error);
            } finally {
                tableContainer.style.opacity = '1';
                tableContainer.style.pointerEvents = 'auto';
            }
        }

        // Handle search input (debounce)
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const url = new URL(searchForm.action);
                url.searchParams.set('search', this.value);
                updateTable(url.toString());
            }, 500);
        });

        // Prevent form submission reload
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const url = new URL(this.action);
            url.searchParams.set('search', searchInput.value);
            updateTable(url.toString());
        });

        // Handle pagination clicks (Event Delegation)
        tableContainer.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination-container a');
            if (link) {
                e.preventDefault();
                updateTable(link.href);
            }
        });

        // Handle Reset button click
        document.addEventListener('click', function(e) {
            const resetBtn = e.target.closest('.reset-search');
            if (resetBtn) {
                e.preventDefault();
                searchInput.value = '';
                updateTable(resetBtn.href);
            }
        });
    });
</script>
@endsection
