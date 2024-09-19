<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ModelM;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelM>
 */
class ModelMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ModelM::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
