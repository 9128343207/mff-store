<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVPayAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_pay_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('store_id');
            $table->string('title');
            $table->integer('a_payment_methods_id');
            $table->text('attributes');
            $table->integer('priority')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('v_pay_accounts');
    }
}
