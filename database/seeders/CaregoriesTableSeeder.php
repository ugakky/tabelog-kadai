<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CaregoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = [
            '和食', '洋食', '中華', '寿司', 'てんぷら', 'うどん', 'そば', '定食', 'ラーメン', 'たこ焼き', 'お好み焼き'
        ];


        foreach ($category_names as $category_name) {
            Category::create([
                'name' => $category_name,
            ]);
        }
    }
}
