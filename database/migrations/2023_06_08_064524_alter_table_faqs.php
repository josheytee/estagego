<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFaqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('faqs',function ( Blueprint $table)
        {
            $table->longText('answer')->change();
            
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('faqs',function ( Blueprint $table)
        {
            $table->string('answer')->change();
        } );
    }
}
