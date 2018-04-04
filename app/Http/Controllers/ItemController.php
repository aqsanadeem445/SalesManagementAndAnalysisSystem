<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
class ItemController extends Controller
{
    public function store(Request $request)
    {
    
    	//Validating the Request Recieved from the Add Items Page

    	$this->validate(request(),[
    		'Name' => 'required|max:10',
    		'Cost_price' => 'required',
    		'Sale_price' => 'required',
    		]);
		
        
        $item = App\item::create(array(
           	'Name' => $request->get('Name'),
            'Cost_price' => $request->get('Cost_price'),
            'Sale_price' => $request->get('Sale_price'),
            'Category_id' => $request->get('Category_id'),
            'Supplier_id' => $request->get('Supplier_id'),
        ));

        $item->save();

    
        return view('AddItems',['item' => $item]);
    }
    //Update the items
    public function update(Request $request)
    {

    }
    //Display The Total Items.
    public function show()
    {
        $orders = DB::table('items as it')
            ->join('ingredient_item as ing_it','ing_it.item_id','=','it.id')
            ->join('ingredients as ing','ing.id','=','ing_it.ingredient_id')
            ->join('shop_ingredients as si','si.Ingredients_id','=','ing.id')
            ->join('shops as s','s.id','=','si.Shop_id')
            ->select('it.Name','it.id','it.Sale_price','it.Cost_price','it.Img_Path','s.id')
            ->where('si.Quantity','>','0')
            ->distinct()
            ->get();

        return compact('orders');
    }


}
 