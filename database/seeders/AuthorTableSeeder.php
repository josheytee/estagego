<?php

namespace Database\Seeders;
use App\Models\Authur;

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authur::factory(10)->create();
    }
}
