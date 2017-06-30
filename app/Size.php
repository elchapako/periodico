<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Size extends Models
{
    protected $fillable = ['size'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
