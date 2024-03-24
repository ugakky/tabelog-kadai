<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('store_name', 50); //店舗名
            $table->string('telephone', 15); //電話番号
            $table->string('address', 100); //住所
            $table->time('open_time'); //開始時刻
            $table->time('close_time'); //終了時刻
            $table->string('regular_holiday', 20); //定休日
            $table->integer('max_price'); //上限価格
            $table->integer('lower_price'); //下限価格
            $table->bigInteger('category_id')->unsigned(); //カテゴリID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
