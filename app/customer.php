<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'customers';
    protected $fillable = array(
        'Name',
        'Email',
    );

    public $timestamps = true;
}

