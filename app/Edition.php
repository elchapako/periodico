<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Edition extends Model
{
    protected $fillable = ['date', 'number_of_edition'];

    static function createEdition()
    {
        $date= Carbon::tomorrow(-4);
        $all = Edition::all();
        $last= $all->last();
        $number = $last->number_of_edition;

        if ($number==null){
            $number_of_edition = config('app.edition_number')+1;
        }else{
            $number_of_edition = $number+1;
        }
        $edition = new Edition();
        $edition->date = $date;
        $edition->number_of_edition = $number_of_edition;
        $edition->save();

        Session::flash('message', 'Edición de fecha '. $date . ' fue creada');
    }
}
