<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Editionsection;
use App\Note;
use App\Section;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->with('editionsection.section', 'editionsection.pages.area', 'editionsection.pages.notes', 'editionsection.pages.ads.size')->first();
        //dd($activeEdition);
        $notes = Note::where('discarded', false)->whereNotIn('status', [7])->get();

        return view('reports.edition', compact('activeEdition', 'notes'));
    }
}
