<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use App\Services\StripeService; // StripeServiceクラスをインポート

class CheckoutController extends Controller
{
    protected $stripeService; // StripeServiceのインスタンスを格納するプロパティ

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function index()
    {
        // データベースから会員ステータスを取得（仮の例）
        $member_status = Auth::user()->member_status;

        // ビューにデータを渡す
        return view('checkout.index', compact('member_status'));
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

        // 定期購読IDを取得して保存する
        $subscriptionId = $checkout_session->subscription;
        $user = Auth::user();
        $user->stripe_subscription_id = $subscriptionId;
        $user->save();

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

    // 購読キャンセル時の処理
    public function cancel()
    {
        $user = Auth::user();

        if ($user->member_status === "paid" && $user->stripe_subscription_id !== null) {
            // ユーザーが定期購読している場合の処理
            $this->cancelSubscription($user);
        }

        // ユーザーの会員ステータスを更新
        $user->member_status = "free";
        $user->save();

        // リダイレクトとメッセージを返す
        return redirect()->route('cancelled')->with('status', '退会が完了しました');
    }

    // 定期購読のキャンセル処理
    protected function cancelSubscription($user)
    {
        $stripeSubscriptionId = $user->stripe_subscription_id;

        try {
            // Stripe で定期購読をキャンセル
            \Stripe\Subscription::update($stripeSubscriptionId, [
                'cancel_at_period_end' => true // 次の請求日でキャンセル
            ]);
        } catch (\Exception $e) {
            // エラー処理
            // 何らかのエラーが発生した場合の処理を記述
        }
    }

}
