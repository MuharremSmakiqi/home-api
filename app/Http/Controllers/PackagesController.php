<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request; 
use App\Services\PackageService;

class PackagesController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function index()
    {
        $packagesWithAvailability = $this->packageService->getPackagesWithAvailability();

        return response()->json(['packages' => $packagesWithAvailability], 200);
    }
}
