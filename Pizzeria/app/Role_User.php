<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    public $timestamps = false;
    protected $fillable = ['role_id', 'user_id'];
}
