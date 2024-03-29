<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripeService
{
    public function createCustomer()
    {
        $user = Auth::user();

        // StripeのAPIキーをセット
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Stripeの顧客を作成
            $customer = \Stripe\Customer::create([
                'email' => $user->email,
            ]);

            // ユーザーの Stripe 顧客ID を更新
            $user->stripe_customer_id = $customer->id;
            $user->save();

            return true;
        } catch (ApiErrorException $e) {
            // エラーが発生した場合の処理
            return false;
        }
    }

    public function cancelSubscription()
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

            // ユーザーの会員ステータスを更新
            $user->member_status = "free";
            $user->save();

            return true;
        } catch (ApiErrorException $e) {
            // エラーが発生した場合の処理
            return false;
        }
    }
}
