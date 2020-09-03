<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store_name');
            $table->integer('user_id');
            $table->text('description')->nullable();
            $table->text('payment_information')->nullable();
            $table->text('business_information')->nullable();
            $table->text('shipping_information')->nullable();
            $table->text('tax_information')->nullable();
            $table->text('info')->nullable();
            $table->text('security')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
