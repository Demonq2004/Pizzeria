<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','order','miejsce','telefon', 'Miejscowosc', 'Ul_adres', 'kod_pocztowy','Czas_Dostarczenia','Cena','Status','tel1','tel2','tel3','tel4'];
}
