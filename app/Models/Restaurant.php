<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Restaurant extends Model
{
    use HasFactory, Favoriteable;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reservations()
    {
        return $this->HasMany(Reservation::class);
    }

    public function favorite(Restaurant $restaurant)
    {
        Auth::user()->togglefavorite($restaurant);

        return back();
    }
}
