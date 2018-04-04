<?php

use Illuminate\Database\Seeder;
class ItemsSeeder extends Seeder
{
    
   public function run()
   {
   
  
  //Generating Random Items To Be Put In ITEMS Table;
  //Items Table contains all the required information about
  //The Item except the Quantity in each Shop.
  for($i=1;$i<=100;$i++){
    $names = ["Falooda","Biryani","Milk","Bread"];
    $Item_Name=$names[rand()%4];;
    $Cost_price=rand()%100;
    $Sale_price=$Cost_price*1.1;
    $Supplier_id=rand()%90+10;
    $Category_id=rand()%10+1;
      DB::table('items')->insert([
        
        'Name' => $Item_Name,
        'Cost_price' => $Cost_price,
        'Sale_price' => $Sale_price,
        'Supplier_id' => $Supplier_id,
        'Category_id' => $Category_id,
        ]);


      //Populating the Shops_items Table
    for ($j=1;$j<=3;$j++){
      DB::table('shop_items')->insert([
        
        'Shop_id' => $j,
        'Item_id' => $i,
        'Quantity' => rand()%100+500,
        ]);
    }


    } //for loop end
   }  //Run()
}
