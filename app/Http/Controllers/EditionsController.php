<?php

namespace App\Http\Controllers;

use App\Edition;
use Styde\Html\Facades\Alert;

class EditionsController extends Controller
{
    public function index()
    {
        $editions = Edition::take(7)->OrderBy('created_at', 'DESC')->get();
        return view('editions.index', compact('editions'));
    }

    public function store()
    {
        if(Edition::next()->count()==1){
        Alert::danger('No se puede crear más ediciones hasta no terminar la edición activa');
        }else{
        Edition::createNextEdition();
        }
        return redirect()->route('editions.index');
    }
}
