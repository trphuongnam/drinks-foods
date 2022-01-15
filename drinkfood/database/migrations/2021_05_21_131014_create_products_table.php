<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('brand');
            $table->string('image')->nullable();
            $table->integer('id_cat')->unsigned();
            $table->integer('id_user_created')->unsigned();
            $table->integer('price')->nullable();
            $table->tinyInteger('type');
            $table->integer('sale_off')->nullable();
            $table->tinyInteger('status');
            $table->string('uid', 20);
            $table->string('url_key');
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
