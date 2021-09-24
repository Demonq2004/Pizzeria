<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['nazwa', 'cena', 'dostawca', 'data_waznosci','dostepny'];
}
