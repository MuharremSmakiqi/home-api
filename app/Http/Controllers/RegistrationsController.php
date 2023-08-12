<?php

namespace App\Http\Controllers;
 
use App\Models\Packages;
use App\Models\Customers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Registrations;

class RegistrationsController extends Controller
{
   public function register(Request $request, $id)
    {

        $customer = Customers::find($request->customer_id);
        $registeredCount = Registrations::where('customer_id', $request->customer_id)->count(); 
        $limit = Packages::where('id', $id)->pluck('limit')->first();
  
        if (!$customer) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $package = Packages::find($id);

        if (!$package) {
            return response()->json(['error' => 'Package not found'], 404);
        }

        // Count the number of registrations for this package
        $registeredCount = Registrations::where('package_id', $id)->count();

        if ($registeredCount >= $limit) {
            return response()->json(['error' => 'Package is already full'], 400);
        } 

        // Create a new registration
        Registrations::create([
            'uuid' => Str::uuid(),
            'customer_id' => $customer->id,
            'package_id' => $package->id,
            'registered_at' => now(),
        ]);

        return response()->json(['message' => 'Package registration successful'], 201);
    
    }
}
