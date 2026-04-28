<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = [
        'package_name', 'slug', 'package_type', 'category_id',
        'price_1pax', 'price_2pax', 'price_3pax', 'price_4pax',
        'price_5pax', 'price_8pax', 'price_10pax',
        'duration', 'destination', 'city', 'description',
        'meeting_point', 'daily_schedule', 'itinerary',
        'persyaratan', 'facilities_included', 'facilities_excluded',
        'dp_days_before', 'payment', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
