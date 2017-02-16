<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['area_id', 'section_id'];

    public function section()
    {
        return $this->belongsTo(SectionName::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
