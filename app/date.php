<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = ['dates'];

    public function ads()
    {
        return $this->belongsToMany(Ad::class)
            ->withTimestamps();
    }

    public function scopePublicities($query, $activeDate)
    {
        return $query->where('dates', $activeDate);
    }

}
