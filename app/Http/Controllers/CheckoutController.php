<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $line_items[] = [
            'price_data' => [
                'currency' => 'jpy',
                'product_data' => [
                    'name' => '有料会員登録料金',
                ],
                'unit_amount' => env('MEMBERSHIP_FEE'),
            ],
            'quantity' => 1,
        ];

        $checkout_session = Session::create([
            'line_items' => $line_items, //支払い対象となる商品
            'mode' => 'payment',  //支払いモード
            'success_url' => route('checkout.success'), //決済成功時のリダイレクト先URL
            'cancel_url' => route('checkout.index'),  //決済キャンセル時のリダイレクト先URL
        ]);

        return redirect($checkout_session->url);
    }

    public function success()
    {
        $user = Auth::user();
        $user->member_status = "paid";
        $user->member_ship_fee = intval(env('MEMBERSHIP_FEE', 0)); // メンバーシップ料金を取得し、整数に変換して設定
        $user->save(); // ユーザー情報を更新

        $user->touch(); // タイムスタンプを更新

        return view('checkout.success');
    }

    public function cancel()
    {
        $user = Auth::user();

        // StripeのAPIキーをセット
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Stripeの顧客IDを取得
            $stripeCustomerId = $user->stripe_customer_id;

            // 顧客IDを使用して定期購読をキャンセル
            $subscription = \Stripe\Subscription::retrieve($user->stripe_subscription_id);
            $subscription->cancel();

            // 顧客を削除（オプション）
            // Stripe\Customer::retrieve($stripeCustomerId)->delete();

            // ユーザーの会員ステータスを更新
            $user->member_status = "free";
            $user->save();

            // リダイレクトとメッセージを返す
            return redirect()->back()->with('status', '退会が完了しました');
        } catch (ApiErrorException $e) {
            // エラーが発生した場合の処理
            return redirect()->back()->withErrors(['stripe_error' => 'Stripeでエラーが発生しました: ' . $e->getMessage()]);
        }
    }
}