<?php

namespace App\Services;

use App\Models\Packages;
use App\Models\Registrations;

class PackageService
{
    public function getPackagesWithAvailability()
    {
        $packages = Packages::all();

        $packagesWithAvailability = $packages->map(function ($package) {
            $registeredCount = Registrations::where('package_id', $package->id)->count();
            $availability = $registeredCount < $package->limit ? 'available' : 'unavailable';

            return [
                'package' => $package,
                'availability' => $availability,
                'registered_count' => $registeredCount,
                'limit' => $package->limit,
            ];
        });

        return $packagesWithAvailability;
    }
}
