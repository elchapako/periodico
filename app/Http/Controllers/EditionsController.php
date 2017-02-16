<?php

namespace App\Http\Controllers;

use App\Edition;
use Carbon\Carbon;
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
        if(Edition::getLastDate()==Carbon::tomorrow()){
        Session::flash('message', 'No se puede crear más ediciones hasta no terminar la activa');
        }else{
        Edition::createEdition();
        }
        return redirect()->route('editions.index');
    }
}
