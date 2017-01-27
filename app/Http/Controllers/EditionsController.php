<?php

namespace App\Http\Controllers;

use App\Edition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EditionsController extends Controller
{
    public function index()
    {
        $fields = DB::select('SELECT * FROM editions WHERE number_of_edition=(SELECT MAX(number_of_edition) FROM editions)');
        return view('editions.index', compact('fields'));
    }

    public function store()
    {
        $edition = request()->all();
        $date = array_get($edition, 'date');
        $number_of_edition = array_get($edition, 'number_of_edition');

        $date= new Carbon($date);
        $date->addDay();

        $number_of_edition = $number_of_edition + 1;

        $edition = new Edition();
        $edition->date = $date;
        $edition->number_of_edition = $number_of_edition;
        $edition->save();

        Session::flash('message', 'Edición de fecha '. $date . ' fue creada');

        return redirect()->to('editions');
    }
}
