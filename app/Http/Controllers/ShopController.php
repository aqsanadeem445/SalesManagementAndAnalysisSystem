<?php

namespace App\Http\Controllers;

use App\shop as shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
         $shop = shop::create(array(
            'Location' => $request->get('Location'),
            'Total_orders' => $request->get('Total_orders'),
            'Total_customers' => $request->get('Total_customers'),
        ));

        $shop->save();  	
}
