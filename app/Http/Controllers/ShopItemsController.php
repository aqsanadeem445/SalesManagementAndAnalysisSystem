<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop_item as shop_item;
class ShopItemsController extends Controller
{
	//Add Items into a particular shop
    public function store(Request $request)
    {
    //Creates an Order Object and gets the Data of Order from the Request.	
        $shop_item = shop_item::create(array(
            'Shop_id' => $request->get('Shop_id'),
            'Item_id' => $request->get('Item_id'),
            'Quantity' => $request->get('Quantity'),
        ));

        $shop_item->save();
       

    
        return view('Welcome');
    }
}
