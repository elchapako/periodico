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

    static function createEdition()
    {
        $date= Edition::getLastDate()->addDay();
        $number_of_edition = Edition::getLastEditionNumber();
        $status = Edition::changeStatus();
        $edition = new Edition();
        $edition->date = $date;
        $edition->number_of_edition = $number_of_edition+1;
        $edition->save();
        Alert::success('Edicion de fecha ' . $edition->publish_date . ' fue creada');
        return $edition;
    }

    static function getLastEditionNumber()
    {
        if (! $last= Edition::latest()->first()) {
            return config('app.edition_number');
        }
        return $last->number_of_edition;
    }

    static function getLastDate()
    {
        if (! $last = Edition::latest()->first()){
            return Carbon::today();
        }
        return $last->date;
    }

    static function changeStatus()
    {
        if ($last = Edition::latest()->first()){
            $find = Edition::find($last->id);
            $find->status = 'active';
            $find->save();
        }
    }

    public function getPublishDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }
}
