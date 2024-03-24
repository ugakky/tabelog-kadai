<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);


        return view('reservations.subscription', compact('restaurant'));
    }

    public function store(Request $request)
    {
        $time = $request->input('time');
        $date = $request->input('date');
        $reservationTime = $date . ' ' . $time;
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->restaurant_id = $request->input('restaurant_id');
        $reservation->time = $reservationTime;
        $reservation->people = $request->input('people');
        $reservation->save();

        return redirect()->route('reservations.index');
    }
}
