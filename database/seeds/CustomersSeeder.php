<?php

use Illuminate\Database\Seeder;
class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1;$i<=50;$i++){
		$Name="Customer No {$i}";
		$Email="CustomerNo{$i}@gmail.com";
		$Total_orders=0;
    	DB::table('customers')->insert([
     		'Name' => $Name,
     		'Email' => $Email,
     		'Total_orders' => $Total_orders,
        ]);
        Schema::create("Customer_{$i}", function($table){
        	$table->increments('id');
        	$table->integer('Order_no');
    		$table->integer('Total_items');
			});
    	}
	}
}

