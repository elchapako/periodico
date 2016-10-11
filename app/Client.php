<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['full_name', 'phone', 'cellphone', 'ci', 'email'];
}
