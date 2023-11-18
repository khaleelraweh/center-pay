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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('content')->nullable(); //done apart 
            $table->string('url')->nullable();
            $table->string('target')->default('_self');
            $table->dateTime('published_on')->nullable();
            $table->boolean('featured')->default(false); // done 
            $table->boolean('status')->default(false); // done 
            $table->date('publish_date')->nullable(); // done 
            $table->time('publish_time')->nullable(); // done 
            $table->boolean('view_in_main')->default(false); // done 
            $table->integer('views')->default(0); // عدد المشاهدات  //done 
            $table->unsignedBigInteger('section')->default(1); // one means it related to any main slider
            $table->string('created_by')->nullable(); // done 
            $table->string('updated_by')->nullable(); // done 
            $table->string('deleted_by')->nullable(); // done 
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
};
