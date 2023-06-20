<?php

namespace Database\Seeders;
use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Home::factory()->create();
        
    }
}
