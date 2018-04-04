<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'shops';
    protected $fillable = array(
        'Total_orders',
        'Total_customers',
        'Location',
    );

    public $timestamps = true;

    public function Items(){
    return $this->hasMany('App\Item','shop_item','shop_id','item_id');
    }
}





