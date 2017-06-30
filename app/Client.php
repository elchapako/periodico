<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Client extends Models
{
    protected $fillable = ['full_name', 'phone', 'cellphone', 'ci', 'address', 'email'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
