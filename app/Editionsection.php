<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editionsection extends Model
{
    protected $fillable = ['no_pages', 'section_id', 'edition_id'];

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
}
