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
            $table->integer('quantity')->nullable()->default(-1);// سالب واحد تعني ان الكمية غير محدودة
            $table->double('price')->default(0.0);
            $table->double('offer_price')->nullable()->default(0.0); // سعر العرض
            $table->date('offer_ends')->nullable(); // تاريخ انتهاء العرض 
            $table->string('sku')->nullable();
            $table->integer('max_order')->nullable()->default(-1);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(false);
            $table->date('publish_date')->nullable();
            $table->time('publish_time')->nullable();
            $table->boolean('view_in_main')->default(false);
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete();
            $table->dateTime('published_on')->nullable(); // تاريخ انشاء الملف 
            $table->string('created_by')->default('admin');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->integer('views')->default(0);
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
