<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
 

class CustomersController extends Controller
{
    public function register(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Check if the user with the same email exists
        if (Customers::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'User with this email already exists'], 422);
        }

        // Create a new Customers
        $user = Customers::create([
            'uuid' => Str::uuid(), //TODO: or we could generate any other format number with special method
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

         $customer = Customers::where('email', $request->email)->first();

          if ($customer && password_verify($request->password, $customer->password)) {
            $token = $customer->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

}
