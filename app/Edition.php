<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Edition extends Model
{
    protected $fillable = ['date', 'number_of_edition', 'status'];

    static function createEdition()
    {
        $date= Carbon::tomorrow(-4);
        $number_of_edition = Edition::getEditionNumber();
        $edition = new Edition();
        $edition->date = $date;
        $edition->number_of_edition = $number_of_edition;
        $edition->save();

        Session::flash('message', 'Edición de fecha '. $date . ' fue creada');
    }

    static function getEditionNumber()
    {
        $lastNumber = Edition::latest()->first()->number_of_edition;
        if (! $lastNumber){
            return config('app.edition_number')+1;
        }
        return $lastNumber+1;
    }
}
