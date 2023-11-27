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
            $table->string('content')->nullable(); 
            $table->string('url')->nullable();
            $table->string('target')->default('_self');
            $table->unsignedBigInteger('section')->default(1); 
            $table->dateTime('start_date')->nullable()->default(now());
            $table->dateTime('expire_date')->nullable()->default(now());

            // will be use always
            $table->boolean('status')->default(false);
            $table->boolean('featured')->default(false); 
            $table->dateTime('published_on')->nullable(); 
            $table->boolean('view_in_main')->default(false); 
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
        Schema::dropIfExists('sliders');
    }
};
