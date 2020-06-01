<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_id');
            $table->string('name');
            $table->string('bname');
            $table->string('manufacturer');
            $table->text('s_desc');
            $table->string('item_weight')->nullable();
            $table->string('weight_measure_unit')->nullable();
            $table->string('volume')->nullable();
            $table->string('volume_measure_unit')->nullable();
            $table->longText('warranty_desc')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description2')->nullable();
            $table->longText('description3')->nullable();
            $table->integer('in_stock');
            $table->string('stock_measurement')->nullable();
            $table->text('product_category_id')->nullable();
            $table->string('price');
            $table->string('discount_price')->nullable();
            $table->string('currency')->nullable();
            $table->integer('review_id')->nullable();
            $table->integer('faq_id')->nullable();
            $table->integer('queans_id')->nullable();
            $table->integer('varient_id')->nullable();
            $table->string('status')->nullable();
            $table->string('tag')->nullable();
            $table->string('sort')->nullable();
            $table->string('sold')->nullable();
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
}
