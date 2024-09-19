<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;

class DepartmentFactory extends Factory
{
    protected $models = Department::class;
    public function definition()
    {
        return [
            'department_name' => ucfirst($this->faker->words(2, true)),
            'floor' => $this->faker->numberBetween(1, 10),
            'unit' => $this->faker->numberBetween(1, 50),
            'building' => $this->faker->streetName,
            'street_address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'zip_code' => $this->faker->numberBetween(100000, 999999), // Generate a 6-digit zip code
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
