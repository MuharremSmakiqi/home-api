<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Packages;

class PackageTest extends TestCase
{
    public function testPackageLimit()
    {
        $package = Packages::factory()->create(['limit' => 15]);

        $this->assertEquals(15, $package->limit);
    }
}
