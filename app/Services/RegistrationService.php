<?php

namespace App\Services;

use App\Models\Customers;
use App\Models\Packages;
use App\Models\Registrations;
use Illuminate\Support\Str;

class RegistrationService
{
    public function register($customerId, $packageId)
    {
        $customer = Customers::find($customerId);
        $registeredCount = Registrations::where('customer_id', $customerId)->count();
        $limit = Packages::where('id', $packageId)->pluck('limit')->first();

        if (!$customer) {
            return ['success' => false, 'error' => 'User not found'];
        }

        $package = Packages::find($packageId);

        if (!$package) {
            return ['success' => false, 'error' => 'Package not found'];
        }

        if ($registeredCount >= $limit) {
            return ['success' => false, 'error' => 'Package is already full'];
        }

        // Create a new registration
        Registrations::create([
            'uuid' => Str::uuid(),
            'customer_id' => $customer->id,
            'package_id' => $package->id,
            'registered_at' => now(),
        ]);

        return ['success' => true, 'message' => 'Package registration successful'];
    }
}
