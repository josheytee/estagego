<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::dropIfExists('faqs');
        Schema::dropIfExists('sub_categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
             $table->unsignedInteger('page_id');
            $table->timestamps();
            $table->foreign('page_id')   
				->references('id')
                ->on('pages')
                ->onDelete('cascade') 
                ->onUpdate('cascade') ; 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
