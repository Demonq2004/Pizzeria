<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;
    protected $fillable = ['nazwa', 'skladniki', 'img', 'cena'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'pizza_products', 'pizza_id', 'product_id');
    }
}
