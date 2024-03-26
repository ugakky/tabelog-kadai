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
        Schema::table('reservations', function (Blueprint $table) {
            // ユーザーIDカラムが存在しない場合のみ追加
            if (!Schema::hasColumn('reservations', 'user_id')) {
                $table->bigInteger('user_id')->unsigned()->after('id');
            }

            // レストランIDカラムが存在しない場合のみ追加
            if (!Schema::hasColumn('reservations', 'restaurant_id')) {
                $table->bigInteger('restaurant_id')->unsigned()->after('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // カラムが存在する場合のみ削除
            if (Schema::hasColumn('reservations', 'user_id')) {
                $table->dropColumn('user_id');
            }

            if (Schema::hasColumn('reservations', 'restaurant_id')) {
                $table->dropColumn('restaurant_id');
            }
        });
    }
};
