<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
