<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable = array(
        'Item_id',
        'Order_id',
        'Customer_id',
        'Order_date',
        'Complete',
        'Shop_id',
        'status',

    );
    public function Items(){

        return $this->belongsToMany('App\Item')->withPivot('Quantity');
        
    }

    public $timestamps = true;

}

