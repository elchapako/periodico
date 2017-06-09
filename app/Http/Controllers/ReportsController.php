<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Editionsection;
use App\Section;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->with('editionsection.section')->with('editionsection.pages')->first();
        //dd($activeEdition);
        return view('reports.edition', compact('activeEdition'));
    }
}
