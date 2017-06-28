<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Area extends Models
{
    protected $fillable = ['name'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
