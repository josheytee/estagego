<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            // $table->unsignedInteger('category_id');
            $table->string('subcategory_name');
            $table->string('question');
            $table->string('answer');
            $table->string('featured',100);
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('sub_categories')
                  ->onDelete('cascade') 
                ->onUpdate('cascade') ; 
            

            // $table->foreign('category_id')
            //       ->references('category_id')
            //       ->on('sub_categories')
            //       ->onDelete('cascade') 
            //     ->onUpdate('cascade') ; 
        
            // $table->foreign('subcategory_id')
            //       ->references('subcategory_name')
            //       ->on('sub_categories')
            //       ->onDelete('cascade') 
            //     ->onUpdate('cascade') ; 
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
