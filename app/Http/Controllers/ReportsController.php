<?php

namespace App\Http\Controllers;

use App\Edition;
use App\Editionsection;
use App\Note;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ReportsController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->withCount('pages')->with('editionsection.section', 'editionsection.pages.area', 'editionsection.pages.notes', 'editionsection.pages.ads.size')->first();
        //dd($activeEdition);
        $notes = Note::where('discarded', false)->whereNotIn('status', [7])->get();

        return view('reports.edition', compact('activeEdition', 'notes'));
    }

    public function infoPages()
    {
        $activeEdition = Edition::active()->first();
        $date = date_format($activeEdition->date, 'Y-m-d');
        $activePages = Edition::active()->with('editionsection.section', 'editionsection.pages')->first();
        $pages = Activity::where('log_name', $date)->where('subject_type', 'App\Page')->orderBy('subject_id', 'asc')->get();
        $users = User::all();
        return view('reports.info-pages', compact('pages', 'activePages', 'users'));
    }
}
