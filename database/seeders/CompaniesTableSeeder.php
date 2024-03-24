<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            "company_name" => "NAGOYAMESHI株式会社",
            "representative" => "侍太郎",
            "address" => "岡山県倉敷市",
            "telephone" => "090-1111-1111",
            "business" => "飲食店の検索、予約サービス",
        ]);
    }
}
