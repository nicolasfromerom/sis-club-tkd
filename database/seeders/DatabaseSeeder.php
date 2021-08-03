<?php

namespace Database\Seeders;

use App\Models\AcademicDegree;
use App\Models\Address;
use App\Models\Agent;
use App\Models\BloodType;
use App\Models\Phone;
use App\Models\Student;
use App\Models\User;
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
        User::factory(10)->create();
        BloodType::factory(10)->create();
        AcademicDegree::factory(10)->create();
        Student::factory(10)->create();
        Agent::factory(10)->create();
        Student::factory()->hasAddresses(5)->create();
        Student::factory()->hasPhones(5)->create();
        Agent::factory()->hasAddresses(5)->create();
        Agent::factory()->hasPhones(5)->create();
        Student::factory()
            ->has(Agent::factory()->count(10))
            ->create();
    }
}
