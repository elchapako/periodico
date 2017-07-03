<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Photo extends Models
{
    protected $fillable = ['name', 'image'];
}
