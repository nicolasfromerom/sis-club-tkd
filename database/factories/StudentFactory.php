<?php

namespace Database\Factories;

use App\Models\AcademicDegree;
use App\Models\BloodType;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'date_birth' => $this->faker->date,
            'payment' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 299),
            'enrollment'=> $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 299),
            'date_start' => $this->faker->date,
            'code' => $this->faker->randomDigit,
            'dni' => $this->faker->randomDigit,
            //foreign keys
            'academic_degree_id'=> AcademicDegree::factory(),
            'blood_type_id' => BloodType::factory(),
        ];
    }
}
