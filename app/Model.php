<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Model extends Models
{
    protected $table = 'models';
    protected $fillable = ['name', 'image'];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
