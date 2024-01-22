<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_menus', function (Blueprint $table) {
            $table->id();
           
            $table->json('title');
            $table->json('slug');
            $table->string('link')->nullable();
            
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('product_categories')->nullOnDelete();

            $table->unsignedBigInteger('section')->default(1); // 1: main menu   2 : helper menu 

            // will be use always
            $table->boolean('status')->default(true);
            $table->dateTime('published_on')->nullable(); 
            $table->string('created_by')->nullable(); 
            $table->string('updated_by')->nullable(); 
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // end of will be use always
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_menus');
    }
};
