<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Note extends Models
{
    protected $fillable = ['title', 'note', 'area_id', 'reporter_id', 'status'];

    public function reporter()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
