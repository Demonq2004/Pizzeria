<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id','nazwa', 'Miejscowosc', 'Ul_adres', 'kod_pocztowy'];
}
