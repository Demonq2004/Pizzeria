<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza_product extends Model
{
    protected $table = 'pizza_products';
    protected $fillable = ['pizza_id', 'product_id'];
    public $timestamps = false;
}
