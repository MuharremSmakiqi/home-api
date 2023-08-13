<?php

namespace Tests\Unit; 

use App\Services\LoginService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testLoginSuccess()
    {
        $password = 'password123';
        $customer = \App\Models\Customers::factory()->create([
            'password' => bcrypt($password),
        ]);

        $data = [
            'email' => $customer->email,
            'password' => $password,
        ];

        $loginService = app(LoginService::class);
        $token = $loginService->login($data);

        $this->assertNotNull($token);
    }

    public function testLoginFailure()
    {
        $data = [
            'email' => $this->faker->safeEmail,
            'password' => 'invalidPassword',
        ];

        $loginService = app(LoginService::class);
        $token = $loginService->login($data);

        $this->assertNull($token);
    } 
}
