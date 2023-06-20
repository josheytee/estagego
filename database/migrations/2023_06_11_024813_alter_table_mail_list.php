<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMailList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mail_lists', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->string('first_name',50)->nullable()->change();
            $table->string('last_name',50)->nullable()->change();
            $table->string('email',50)->nullable()->change();
            $table->string('phone',50)->nullable()->change();
            $table->string('country',50)->nullable()->change();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_lists');
    }
}
