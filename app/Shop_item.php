<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_item extends Model
{
    
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'shop_items';
    protected $fillable = array(
        'Shop_id',
        'Item_id',
        'Quantity',
        'Name',

    );

    public $timestamps = true;
   
}

