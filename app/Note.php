<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Note extends Models
{
    protected $fillable = ['title', 'note', 'area_id', 'reporter_id', 'status', 'page_id', 'titular', 'photo'];

    public function reporter()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
    public function scopeCorrected($query)
    {
        return $query->where('status', 3)->where('page_id', null);
    }
}
