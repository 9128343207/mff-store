<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsleters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('HTTP_USER_AGENT');
            $table->string('HTTP_COOKIE');
            $table->string('REMOTE_ADDR');
            $table->string('REMOTE_PORT');
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
        Schema::dropIfExists('newsleters');
    }
}
