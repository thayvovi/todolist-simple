<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
        [
            //thay đổi nội dung để có 1 factory dùng trong việc tạo dữ liệu
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'images' => $this->faker->image('public/images', 640, 480, 'cats', false),
            'completed' => false,
            //Sau khi làm xong thì dùng lệnh arsisan seed để tạo 1 seed dữ liệu
        ];
    }
}
