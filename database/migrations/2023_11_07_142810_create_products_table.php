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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('quantity')->default(false);
            $table->double('price');
            $table->double('offer_price')->default(0.0);
            $table->dateTime('offer-ends')->nullable();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('max-order')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(false);
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->dateTime('published_on')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('products');
    }
};
