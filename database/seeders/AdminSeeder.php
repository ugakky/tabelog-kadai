<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // 管理者アカウントの作成
        User::create([
            'name' => 'admin',
            'email' => 'mon.pso2@gmail.com',
            'password' => Hash::make('zxcvbnmA1'), // パスワードをハッシュ化して保存
            // その他の必要なフィールドを追加
        ]);
    }
}
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminSeeder::class); // AdminSeederを呼び出す
    }
}

?>