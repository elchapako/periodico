<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Date;
use App\Edition;
use App\Page;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ActiveAdsController extends Controller
{
    public function index()
    {
        $active = Edition::active()->first();
        $activeDate = $active->date;
        $date = Date::where('dates', $activeDate)->first();
        if ($date==null){
            $ads = '';
        }else{
        $ads = $date->ads()->paginate(15);
        }
        return view('active-ads.list', compact('ads'));
    }

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $activeEdition = Edition::active()->with('editionsection.pages')->first();
        $pages= $activeEdition->pages()->where('editionsection_id', $ad->section_id)->pluck('page_number', 'pages.id');

        return view('active-ads.edit', compact('ad', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'page_id' => ['required'],
        ]);

        $ad = Ad::findOrFail($id);
        $page = Page::findOrFail($request->page_id);
        $ad->dates()->updateExistingPivot($id, ['assigned' => true]);
        $ad->pages()->save($page);

        Alert::success('Advertising fue asignada');
        return redirect()->route('active-ads.index');
    }

}
