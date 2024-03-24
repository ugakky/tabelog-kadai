<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);

        return view('reviews.index', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->restaurant_id = $request->input('restaurant_id');
        $review->evaluation = $request->input('evaluation');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('restaurants.index');
    }
}
