<?php

namespace Database\Seeders;
USE App\Models\Testimonials;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonials::factory(5)->create();    }
}
