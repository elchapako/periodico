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
        $date= Carbon::tomorrow()->addDay();
        $number_of_edition = Edition::getLastEditionNumber();
        $status = Edition::getLastStatus();
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
            return Carbon::tomorrow()->addDay();
        }
        return $last->date;
    }

    static function getLastStatus()
    {
        if ($last = Edition::latest()->first()){
            $find = Edition::find($last->id);
            $find->status = 'in-progress';
            $find->save();
        }
    }

    public function getPublishDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }
}
