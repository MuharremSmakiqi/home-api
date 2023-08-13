<?php

namespace App\Services;

use App\Models\Customers;

class LoginService
{
    public function login(array $data)
    {
        $customer = Customers::where('email', $data['email'])->first();

        if ($customer && password_verify($data['password'], $customer->password)) {
            $token = $customer->createToken('authToken')->plainTextToken;

            return $token;
        }

        return null;
    }
}
