<?php

namespace Database\Seeders;

use App\Models\Packages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data from the table
        DB::table('packages')->truncate();

        // Insert 15 fake packages
        Packages::factory(15)->create();
    }
}
