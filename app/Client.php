<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['full_name', 'phone', 'cellphone', 'ci', 'address', 'email'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
