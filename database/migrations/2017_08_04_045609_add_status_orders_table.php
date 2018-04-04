<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function($table) 
        {
            $table->string('status');
        });
    }
    public function down()
    {
        Schema::table('users', function($table) 
        {
            $table->dropColumn('paid');
        });
    }
}
