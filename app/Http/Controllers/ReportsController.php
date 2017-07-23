<?php

namespace App\Http\Controllers;

use App\Date;
use App\Edition;
use App\Note;
use App\User;
use Spatie\Activitylog\Models\Activity;

class ReportsController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->withCount('pages')->with('editionsection.section', 'editionsection.pages.area', 'editionsection.pages.notes', 'editionsection.pages.ads.size')->first();
        $notes = Note::where('discarded', false)->whereNotIn('status', [7])->get();
        $active = Edition::active()->first();
        $activeDate = $active->date;
        $date = Date::where('dates', $activeDate)->first();
        if ($date==null){
            $ads = '';
        }else{
            $ads = $date->ads()->paginate(15);
        }
        $reporters = User::whereIs('reporter')->get();

        return view('reports.edition', compact('activeEdition', 'notes', 'ads', 'reporters'));
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

    public function infoNotes()
    {
        $activeEdition = Edition::active()->first();
        $date = date_format($activeEdition->date, 'Y-m-d');
        $notes = Note::where('discarded', false)->whereNotIn('status', [7])->get();
        $activityNotes = Activity::where('log_name', $date)->where('subject_type', 'App\Note')->orderBy('subject_id', 'asc')->get();
        $users = User::all();

        return view('reports.info-notes', compact('activityNotes', 'notes', 'users'));
    }

    public function infoAds()
    {
        $active = Edition::active()->first();
        $activeDate = $active->date;
        $date = Date::where('dates', $activeDate)->first();
        if ($date==null){
            $ads = '';
        }else{
            $ads = $date->ads()->paginate(15);
        }

        return view('reports.info-ads', compact('ads'));
    }

    public function infoReporters()
    {
        $activeEdition = Edition::active()->first();
        $date = date_format($activeEdition->date, 'Y-m-d');
        $notes = Note::where('discarded', false)->whereNotIn('status', [7])->orderBy('reporter_id', 'asc')->get();
        $activityNotes = Activity::where('log_name', $date)->where('subject_type', 'App\Note')->orderBy('subject_id', 'asc')->get();
        $reporters = User::whereIs('reporter')->get();

        return view('reports.info-reporters', compact('activityNotes', 'notes', 'reporters'));
    }
}
