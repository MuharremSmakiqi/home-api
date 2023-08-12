<?php

namespace Database\Factories\Packages;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
      
     protected $model = \App\Models\Package::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->word,
            'limit' => $this->faker->numberBetween(3, 8),
        ];
    }
}
