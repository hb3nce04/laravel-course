<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo2hb6Gjy5UFPJUTHFdkUdUT_xjknR5a6u_g9xK_V5FFrxjo-0yOUeJ0tYpfdctg-DWQk&usqp=CAU",
            'position' => function(array $attributes) {
                return Car::find($attributes['carId'])->images()->count() + 1;
            }
        ];
    }
}
