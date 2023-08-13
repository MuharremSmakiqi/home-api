<?php

namespace App\Http\Controllers;

use App\Models\Customers; 
use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Services\CustomersService;
use App\Validators\LoginValidator;
use Illuminate\Routing\Controller; 
use App\Validators\RegistrationValidator; 
 

class CustomersController extends Controller
{
    public function register(Request $request, CustomersService $customerService)
    {
        // Validate input data
        $validator = RegistrationValidator::validate($request->all());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Check if the user with the same email exists
        if (Customers::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'User with this email already exists'], 422);
        }

        // Create a new Customers 
        $user = $customerService->registerCustomer($request->all());

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    
     public function login(Request $request, LoginService $loginService)
    {
        // Validate input data
        $validator = LoginValidator::validate($request->all());

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $data = $request->only(['email', 'password']);
        $token = $loginService->login($data);

        if ($token) {
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

}
