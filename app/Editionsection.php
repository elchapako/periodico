<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editionsection extends Model
{
    protected $fillable = ['section_id', 'edition_id'];

    //protected $with = [
    //    'sections',
    //    'pages'
    //];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function scopeDay($query, $edition, $section)
    {
        return $query->where('edition_id', $edition->id)
            ->where('section_id', $section->id);
    }

    public function addPages($pages_number)
    {
        for ($i=1; $i <= $pages_number / 4; $i++) {
            $this->pages()->saveMany(Page::newGroup($i));
        }
    }
}
