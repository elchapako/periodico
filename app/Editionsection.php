<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\ActivitylogFacade;

class Editionsection extends Model
{
    protected $fillable = ['section_id', 'edition_id'];

    //protected $with = [
    //    'section',
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
        for ($i=1; $i <= $pages_number; $i++) {
            $page = $this->pages()->save(Page::create([
                'page_number' => $i,
                'status' => PageStatus::UNREALIZED,
                'editionsection_id' => $this->id,
            ]));
            ActivitylogFacade::log('Creó página: '. $page->id);
        }
    }
}