<?php

namespace App\Services;

use App\Models\Customers;
use Illuminate\Support\Str;

class CustomersService
{
    public function registerCustomer(array $data)
    { 
        $data['uuid'] = Str::uuid(); 
        $data['password'] = bcrypt($data['password']);

        // Create a new user
        $user = Customers::create($data); 
        return $user;
    }
}
