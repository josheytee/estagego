<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country',100);
            $table->string('address',100);
            $table->string('email',100);
            $table->string('phone_number',50);
            $table->string('mobile',50);
            $table->string('facebook_url',100);
            $table->string('twitter_url',100);
            $table->string('linkedin_url',100);
            $table->string('tiktok_url',100);
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
