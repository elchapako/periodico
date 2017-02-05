<?php

namespace App\Http\Controllers;

use App\Edition;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EditionsController extends Controller
{
    public function index()
    {
        $editions = Edition::take(7)->OrderBy('created_at', 'DESC')->get();
        return view('editions.index', compact('editions'));
    }

    public function store()
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

        return redirect()->to('editions');
    }
}
