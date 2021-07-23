<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // gọi đến seeder vừa thêm
        $this->call([
            TodosSeeder::class,
            UserSeeder::class,
        ]);
        //gọi artisan db:seed để thêm dữ liệu vào database
        //php artisan migrate:fresh --seed : khởi tạo lại dữ liệu từ đầu
    }
}
