<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\order as order;
use DB;
class OrderController extends Controller
{
    public function store(Request $request)
    {
        //Creates an Order Object and gets the Data of Order from the Request.
        $order = order::create(array(
            'Total_items' => $request->get('Item_id'),
            'Customer_id' => $request->get('Shop_id'),
            'Order_date' => $request->get('Customer_id'),
            'Profit' => $request->get('Order_id'),
            'Cost_price' => $request->get('Order_date'),
            'Complete' => '0',
        ));

        $order->save();


    }
    public function editst(Request $request)
    {
        $id = $request->all();
        DB::table('orders')
            ->where('id', $id)
            ->update(['Taken' => 1]);        
    }
    public function chef_order()
    {   $makecheck = ['orders.Complete'=>'0','orders.Taken'=>0];
        $chef_orders = DB::table('item_order')
            ->join('items', 'item_order.item_id', '=', 'items.id')
            ->join('orders','orders.id','=', 'item_order.order_id')
            ->select('orders.id','items.Name','item_order.Quantity')
            ->where($makecheck)
            ->get();

        return compact('chef_orders');
    }
    public function savefeed(Request $request)
    {
        $dt = $request->all();
        $id = $dt['id'];
        $feed=$dt['feed'];
        DB::table('orders')
            ->where('id', $id)
            ->update(['Feedback'=>$feed]); 
    }
    public function complete_order(Request $request)
    {
        $id = $request->all();
        DB::table('orders')
            ->where('id', $id)
            ->update(['Complete' => 1,'Status_Percentage'=>100]);
    }
    public function setstatus(Request $request)
    {
        $stats_p;
        $stats_t;
        $data_retr = $request->all();
        $id = $data_retr['id'];
        if(array_key_exists('status_p', $data_retr)) {
            $stats_p = $data_retr['status_p'];
            DB::table('orders')
            ->where('id', $id)
            ->update(['Status_Percentage' => $stats_p]);
        }
      if(array_key_exists('status_t', $data_retr)) {
            $stats_t = $data_retr['status_t'];
            DB::table('orders')
            ->where('id', $id)
            ->update(['Status_Time'=>$stats_t]);
        }
        
    }
    public function showstatus(Request $request)
    {
        $dt = $request->all();
        $id = $dt['id'];
        $showstatus = DB::table('orders')
            ->select('orders.Status_Time','orders.Status_Percentage','orders.Complete')
            ->where('orders.id','=',$id)
            ->get();

        return compact('showstatus');
    }
    public function showsummary(Request $request)
    {
        $dat = $request->all();
        $id = $dat['id'];
        $summary =  DB::table('item_order')
            ->join('items', 'item_order.item_id', '=', 'items.id')
            ->join('orders','orders.id','=', 'item_order.order_id')
            ->select('orders.id','items.Name','item_order.Quantity','items.Img_Path','items.Sale_price')
            ->where('orders.id','=',$id)
            ->get();   
        return compact('summary');   

    }
    public function savecart(Request $request)
    {
        $dt = new order;
        $dt->Shop_id=1;
        $dt->Customer_id=1;
        $dt->Complete = 0;
        $dt->Taken = 0;
        $dt->save();
        $name = $request->all();
        for($i=0;$i<count($name);$i++)
        {
            $nm = $name[$i];
            $id_it = $nm['id'];
            $qt = $nm['count'];
            $dt->Items()->attach($id_it,['Quantity'=>$qt]);
        }
        return ['id'=>$dt->id,'Time'=>$dt->created_at];
    }
}

