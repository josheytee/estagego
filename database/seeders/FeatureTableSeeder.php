<?php

namespace Database\Seeders;
use App\Models\Feature;

use Illuminate\Database\Seeder;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::factory(8)->create();
    }
    
}
