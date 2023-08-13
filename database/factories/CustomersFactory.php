<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    protected $model = Customers::class;

    public function definition()
    {
        return [
            'uuid' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password123'),   
        ];
    }
}
