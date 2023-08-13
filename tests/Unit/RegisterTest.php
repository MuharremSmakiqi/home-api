<?php

namespace Tests\Unit;

use App\Services\CustomersService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker; 
use Tests\TestCase;



class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRegisterSuccess()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 'password123',
        ];

        $customerService = app(CustomersService::class);
        $response = $customerService->registerCustomer($data);

        $this->assertDatabaseHas('customers', [
            'email' => $data['email'],
        ]);

        $this->assertInstanceOf(\App\Models\Customers::class, $response);
    }
}
