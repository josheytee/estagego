<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_title', 50)->nullable();
            $table->string('h1', 100)->nullable();
            $table->string('h2_orange', 100)->nullable();
            $table->string('h2', 50)->nullable();
            $table->string('caption', 100)->nullable();
            $table->string('appstore_url')->nullable(); 
            $table->string('googleplay_url')->nullable();
            $table->string('video_url')->nullable(); 
            $table->integer('total_users')->nullable();
            $table->integer('total_downloads')->nullable();
            $table->integer('total_household')->nullable();  
            $table->integer('total_cities')->nullable(); 
            $table->integer('total_countries')->nullable();   
            $table->string('metatags', 100)->nullable();
            $table->string('keywords', 100)->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();    
        });

//         page_title
// matatags
// keywords
// id
// h1
// h2_orange
// h2
// caption
// appstore_url
// googleplay_url
// video_url
// total_users
// total_downloads
// total_households
// total_cities
// total_countries
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
