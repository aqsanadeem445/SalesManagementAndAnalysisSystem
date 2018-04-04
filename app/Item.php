<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'items';
    protected $fillable = array(
        'Name',
        'Cost_price',
        'Sale_price',
        'Supplier_id',
        'Category_id',
        
        
    );

    public $timestamps = true;

    public function orders() {
        return $this->belongsToMany('App/order')->withPivot('Quantity');
    }
    public function Ingredients(){

        return $this->belongsToMany('App\ingredient');
        
    }

}


