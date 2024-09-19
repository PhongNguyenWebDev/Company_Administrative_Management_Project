<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Location;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Location::class;
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->id,
            'location_name' => $this->faker->company,
            'notes' => $this->faker->sentence,
        ];
    }
}
