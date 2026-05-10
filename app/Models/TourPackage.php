<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = [
        'package_name', 'package_name_en', 'slug', 'package_type_id', 'category_id',
        'price_1pax', 'price_1pax_foreign', 'price_2pax', 'price_2pax_foreign',
        'price_3pax', 'price_3pax_foreign', 'price_4pax', 'price_4pax_foreign',
        'price_5pax', 'price_5pax_foreign', 'price_8pax', 'price_8pax_foreign',
        'price_10pax', 'price_10pax_foreign',
        'duration', 'destination', 'city', 'description', 'description_en',
        'meeting_point', 'meeting_point_en', 'daily_schedule', 'daily_schedule_en',
        'itinerary', 'itinerary_en', 'persyaratan', 'persyaratan_en',
        'facilities_included', 'facilities_included_en', 'facilities_excluded', 'facilities_excluded_en',
        'dp_days_before', 'payment', 'payment_en', 'is_active',
    ];

    /**
     * Helper to get translated content
     */
    public function getTranslation($field)
    {
        $locale = app()->getLocale();
        if ($locale == 'en') {
            $translatedField = $field . '_en';
            return $this->{$translatedField} ?: $this->{$field};
        }
        return $this->{$field};
    }

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function packageType()
    {
        return $this->belongsTo(PackageType::class, 'package_type_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'package_id');
    }
}
