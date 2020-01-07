<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCart extends Migration
{
    public function up()
    {
        Schema::create('table_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('product');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('number_product')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('table_cart');
    }
}
