<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Models;

class Album extends Models
{
    protected $table = 'albums';

    protected $fillable = array('name','description','cover_image');

    public function Photos(){
        return $this->hasMany(Image::class);
    }
}
