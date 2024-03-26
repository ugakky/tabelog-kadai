<?php

use Stripe\Price;

// 価格をセットアップする
$price = Price::create([
    'product' => 'your_product_id', // 商品ID
    'unit_amount' => 1000, // 価格（例: 1000円）
    'currency' => 'jpy', // 通貨（日本円）
]);

// 価格の作成に成功した場合の処理
?>