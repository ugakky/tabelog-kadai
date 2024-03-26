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
        Schema::table('categories', function (Blueprint $table) {
            // 'major_category_id' カラムを追加する
            $table->integer('major_category_id')->after('id')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // 'major_category_id' カラムを削除する
            $table->dropColumn('major_category_id');
        });
    }
};

