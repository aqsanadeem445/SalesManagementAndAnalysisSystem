<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnStTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('orders', function($table)
        {
            $table->dropColumn('status');
            $table->string('Status_Percentage')->nullable();
            $table->string('Status_Time')->nullable();
            $table->string('Feedback')->nullable();
            $table->boolean('Taken');
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
