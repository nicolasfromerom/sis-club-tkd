<?php

namespace Database\Factories;

use App\Models\BloodType;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BloodType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'blood_type' => $this->faker->word,
        ];
    }
}
