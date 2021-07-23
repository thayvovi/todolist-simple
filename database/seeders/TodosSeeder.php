<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tạo 1 dữ liệu trên data base
        // DB::table('todos')->insert([
        //     'name' => Str::random(10),
        //     'description' => Str::random(10),
        //     'completed' => true,
        // ]);

        //Tạo nhiều
        Todo::factory(5)
            // ->count(10)
            // ->hasPosts(1)
            ->create();
        //Sau khi tạo xong thì qua databaseSeeder.php để gọi
    }
}
