@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
      <x-dashboard.ecommerce-metrics :total-users="$totalUsers" />
      <x-dashboard.monthly-sale />
    </div>
    <div class="col-span-12 xl:col-span-5">
        <x-dashboard.monthly-target />
    </div>

    <div class="col-span-12">
      <x-dashboard.statistics-chart />
    </div>

    <div class="col-span-12 xl:col-span-5">
      <x-dashboard.customer-demographic />
    </div>

    <div class="col-span-12 xl:col-span-7">
      <x-dashboard.recent-orders />
    </div>
  </div>
@endsection
