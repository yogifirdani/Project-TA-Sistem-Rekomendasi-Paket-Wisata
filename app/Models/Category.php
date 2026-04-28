<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'slug', 'description', 'icon', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function tourPackages()
    {
        return $this->hasMany(TourPackage::class);
    }
}
