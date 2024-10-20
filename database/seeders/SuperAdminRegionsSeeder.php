<?php
namespace Database\Seeders;

use App\Models\AdminRegion;
use App\Models\Region; // Assuming you have this model
use Illuminate\Database\Seeder;

// Assuming you have this model

class SuperAdminRegionsSeeder extends Seeder
{
    public function run()
    {
        $superAdminId = 1;

        // Get all region IDs
        $regions = Region::pluck('id');

        // Loop through each region and create an entry in AdminRegion
        foreach ($regions as $regionId) {
            AdminRegion::updateOrCreate([
                'admin_id' => $superAdminId,
                'region_id' => $regionId,
            ]);
        }
    }
}
