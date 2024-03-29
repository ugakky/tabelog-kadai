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
    
        if ($reservations->isEmpty()) {
            // 予約がない場合は、特定のビューにリダイレクトする
            return view('reservations.no_reservations');
        }
    
        return view('reservations.index', compact('reservations'));
    }

    public function create(Request $request)
    {
        $restaurantId = $request->input('restaurant_id');
        $restaurant = Restaurant::find($restaurantId);

        if (!$restaurant) {
            // レストランが存在しない場合のエラー処理を追加する
            // 例えば、リダイレクトしてエラーメッセージを表示するなど
            return redirect()->back()->with('error', '指定されたレストランが見つかりませんでした。');
        }

        return view('reservations.subscription', compact('restaurant'));
    }

    public function store(Request $request)
    {
        $time = $request->input('time');
        $date = $request->input('date');
        $reservationTime = $date . ' ' . $time;
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        
        // restaurant_id をリクエストから取得する
        $restaurantId = $request->input('restaurant_id');
        // 対応する Restaurant モデルを取得する
        $restaurant = Restaurant::find($restaurantId);
        // Restaurant モデルが存在すれば、その id をセットする
        if ($restaurant) {
            $reservation->restaurant_id = $restaurant->id;
        } else {
            // 存在しない場合はエラー処理を行うなどの対応が必要
            // ここでは例として、リダイレクトしてエラーメッセージを表示する
            return redirect()->route('reservations.index')->with('error', '指定されたレストランが見つかりませんでした。');
        }
        
        $reservation->time = $reservationTime;
        $reservation->people = $request->input('people');
        $reservation->save();

        return redirect()->route('reservations.index');
    }
    public function cancel(Reservation $reservation)
    {
        // 予約を削除する
        $reservation->delete();

        // キャンセル後に予約一覧ページにリダイレクトし、成功メッセージを表示する
        return redirect()->route('reservations.index')->with('success', '予約をキャンセルしました。');
    }
}
