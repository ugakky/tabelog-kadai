<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function resaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function major_category()
    {
        return $this->belongsTo(MajorCategory::class);
    }
}
