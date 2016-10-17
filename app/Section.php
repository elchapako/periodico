<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
