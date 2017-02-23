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

    public function sections()
    {
        return $this->belongsToMany(SectionName::class);
    }

    public static function createNextEdition()
    {
        $edition = new Edition();
        $edition->date = Edition::getLastDate()->addDay();
        $edition->number_of_edition = Edition::getLastEditionNumber() + 1;
        $edition->save();

        if ($edition->id == 1) {
            $edition->update(['status' => 'active']);
        }
        Edition::asigningSections();
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
        if (! $last = Edition::latest()->first()){
            return Carbon::today();
        }
        return $last->date;
    }

    protected static function activateStatus()
    {
        if ($last = Edition::latest()->first()){
            $last->status = 'active';
            $last->save();
        }
    }

    public static function asigningSections(){
        $edition = Edition::latest()->first();
        $edition->sections()->attach(SectionName::all());
    }

    public function scopeNext($query)
    {
        return $query->where('status', 'next');
    }

    public function getPublishDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }
}
