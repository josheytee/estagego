<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppDownload;

class AppDownloadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppDownload::factory(1)->create();
    }
}
