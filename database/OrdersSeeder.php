<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\order as order;
class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Seeding the Orders Table with Randomly Generated Values;
   public function run()
   {
	for($i=1;$i<=50;$i++){
		$Cost_price=rand()%100;
		$Sale_price=$Cost_price+10;
		$Year=rand()%100+2000;
		$Month=rand()%12+1;
		$Day=rand()%30+1;
		$Total_items=rand()%5;
		$Date = "{$Day}/{$Month}/{$Year}";
		$Shop_id=rand()%3+1;
		$Customer_id=rand()%50+1;
    	DB::table('orders')->insert([
     		'Total_items' => $Total_items,
     		'Customer_id' => $Customer_id,
     		'Profit' => $Sale_price-$Cost_price,
     		'Cost_price' => $Cost_price,
     		'Sale_price' => $Cost_price+10,
            'Order_date' => $Date,
            'Complete' => '0',
            'Shop_id' => $Shop_id,
        ]);

         Schema::create("Order_{$i}", function($table)
		{           
    		$table->increments('id');
    		$table->integer('Item_id');
    		$table->integer('Quantity');
		});
        //Adding Each Item Table into Database
		for($j=1;$j<=$Total_items;$j++){
			$Item_id=rand()%100+1;
			$Quantity=rand()%3+1;
		//Updating the Quantity of  Item in Corresponding Each Shop.
		
		DB::table("Shop_{$Shop_id}")->where('Item_id',$Item_id)->decrement('Quantity', $Quantity);
			

		DB::table("Order_{$i}")->insert([
			'Item_id' => $Item_id,
			'Quantity' => $Quantity,
			]);
		}
		DB::table('orders')->where('id', $i)->update(['Complete' => 1]);
		 $cust = $Customer_id;
		DB::table("Customer_{$cust}")->insert(
			[
			'Order_no' => $i,
			'Total_items' => $Total_items,
			]);
    } //for loop end
   }  //Run()
}  //Class