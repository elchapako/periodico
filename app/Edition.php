<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Styde\Html\Facades\Alert;

class Edition extends Model
{
    protected $fillable = ['date', 'number_of_edition', 'status'];

    protected $dates = [
        'date'
    ];

    //protected $with = [
    //    'editionsection',
    //];

    public function editionsection()
    {
        return $this->hasMany(Editionsection::class);
    }

    public function pages()
    {
        return $this->hasManyThrough('App\Page', 'App\Editionsection');
    }

    public function scopeNext($query)
    {
        return $query->where('status', 'next');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function activate()
    {
        if (Edition::next()->count()==1 && Edition::active()->count()==0) {
            $this->update(['status' => 'active']);
        }
    }

    public function getPublishDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }

    public function assignSection($section)
    {
        return Editionsection::create([
            'section_id' => $section->id,
            'edition_id' => $this->id
        ]);
    }

    public function builderEdition()
    {
        $sections = Section::regulars()->get();

        $sections->each(function ($section)
        {
            $editionSection = $this->assignSection($section);
            $editionSection->addPages($section->pages);
        });
    }

    public static function createNextEdition()
    {
        $edition = new Edition();
        $edition->date = Edition::getLastDate()->addDay();
        $edition->number_of_edition = Edition::getLastEditionNumber() + 1;
        $edition->save();

        if ($edition->id == 1) {
            $edition->activate();
        }
        $edition->builderEdition();
        Alert::success('Edicion de fecha ' . $edition->publish_date . ' fue creada');

        return $edition;
    }

    protected static function getLastEditionNumber()
    {
        if (! $last= Edition::latest()->first()) {
            return config('app.edition_number');
        }
        return $last->number_of_edition;
    }

    public static function getLastDate()
    {
        if (! $last = Edition::latest()->first()) {
            return Carbon::today();
        }
        return $last->date;
    }
}
