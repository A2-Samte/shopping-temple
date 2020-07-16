<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   

    protected $table='product';

    public $timestamps =true;
   
    protected $fillable = [
        'productname', 'manufacturername', 'manufacturerbrand', 'price', 'category', 'features', 'productdesc', 'file',
    ];
}
