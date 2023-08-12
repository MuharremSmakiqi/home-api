<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;
use App\Models\Registrations;

class PackagesController extends Controller
{
    public function index(Request $request)
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

    return response()->json(['packages' => $packagesWithAvailability], 200);
    }
}
