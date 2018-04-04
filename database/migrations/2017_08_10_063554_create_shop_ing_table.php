<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopIngTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shop_ingredients', function (Blueprint $table) {
            $table->integer('Quantity');
            $table->integer('Shop_id')->unsigned();
            $table->integer('Ingredients_id')->unsigned();
             $table->foreign('Shop_id')->references('id')->on('shops');
              $table->foreign('Ingredients_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        
    }
}
