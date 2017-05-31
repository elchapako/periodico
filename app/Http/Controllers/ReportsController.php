<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::where('status', 'active')->first();
        return view('reports.edition', compact('activeEdition'));
    }
}
