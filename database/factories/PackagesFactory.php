<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Packages;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
      
     protected $model = Packages::class;

    public function definition(): array
    {
        return [ 
            //Generate random and unique 6 digit numbers for the uuid 
            'uuid' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->word,
            'limit' => $this->faker->numberBetween(3, 8),
        ];
    }
}
