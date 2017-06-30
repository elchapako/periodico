<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Date extends Models
{
    protected $fillable = ['dates'];

    public function ads()
    {
        return $this->belongsToMany(Ad::class)
            ->withPivot('assigned')
            ->withTimestamps();
    }

    public function scopePublicities($query, $activeDate)
    {
        return $query->where('dates', $activeDate);
    }

}
