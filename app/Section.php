<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'pages'];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function editionsection()
    {
        return $this->hasMany(Editionsection::class);
    }
}
