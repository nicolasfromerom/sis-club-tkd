<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address'=>$this->faker->streetAddress,
            'addressable_id' => Student::factory(),
            'addressable_type' => 'Student'
        ];
    }
}
