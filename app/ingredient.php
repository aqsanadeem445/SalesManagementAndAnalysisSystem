<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'ingredients';
    protected $fillable = array(
        'Name',
    );

    public $timestamps = true;

    public function Items(){

        return $this->belongsToMany('App\Item');
        
    }


}
