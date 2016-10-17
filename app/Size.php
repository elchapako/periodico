<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
