<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        //Tạo 1 dữ liệu trên data base
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'user' => 'admin',
        //     'email' => 'admin@local.com',
        //     'email_verified_at' => '2021-07-20 03:02:27',
        //     'password' => bcrypt('123456789'),
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
