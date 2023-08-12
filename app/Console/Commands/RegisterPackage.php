<?php

namespace App\Console\Commands;

use App\Models\Packages;
use App\Models\Customers;
use Illuminate\Support\Str;
use App\Models\Registrations;
use Illuminate\Console\Command;

class RegisterPackage extends Command
{
    protected $signature = 'register:package {customer_id} {package_id}';
    protected $description = 'Register a specific package to a user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $customerId = $this->argument('customer_id');
        $packageId = $this->argument('package_id');

        $customer = Customers::find($customerId);

        if (!$customer) {
            $this->error('User not found.');
            return;
        }

        $package = Packages::find($packageId);

        if (!$package) {
            $this->error('Package not found.');
            return;
        }

        $registeredCount = Registrations::where('package_id', $packageId)->count();

        if ($registeredCount >= $package->limit) {
            $this->error('Package is not available for registration.');
            return;
        } 

        Registrations::create([
            'uuid' => Str::uuid(), 
            'customer_id' => $customerId,
            'package_id' => $packageId,
            'registered_at' => now(),
        ]);

        $this->info('Package registration successful.');
    }
}
