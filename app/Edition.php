<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Edition extends Model
{
    protected $fillable = ['date', 'number_of_edition', 'status'];

    protected $dates = [
        'date'
    ];

    static function createEdition()
    {
        if(Edition::getLastDate()==Carbon::tomorrow()){
            Session::flash('message', 'No se puede crear más ediciones hasta no terminar la activa');
        }else{
        $date= Carbon::tomorrow();
        $number_of_edition = Edition::getLastEditionNumber();
        $edition = new Edition();
        $edition->date = $date;
        $edition->number_of_edition = $number_of_edition+1;
        $edition->save();

        Session::flash('message', 'Edición de fecha '. $date . ' fue creada');
        }
    }

    static function getLastEditionNumber()
    {
        $lastNumber = Edition::latest()->first()->number_of_edition;
        if (! $lastNumber){
            return config('app.edition_number')+1;
        }
        return $lastNumber;
    }

    static function getLastDate()
    {
        return $lastDate = Edition::latest()->first()->date;
    }

    public function getPublishDateAttribute()
    {
        return $this->date->format('d/m/Y');
    }
}
