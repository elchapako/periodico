<?php

namespace App\Http\Controllers;

use App\Area;
use App\Edition;
use App\Page;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ActivePagesController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->with('editionsection.section', 'editionsection.pages.area')->first();
        return view('active-pages.list', compact('activeEdition'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $areas = Area::pluck('name', 'id');
        return view('active-pages.edit', compact('page', 'areas'));
    }

    public function update($id)
    {
        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        Alert::success('Page '. $page->page_number . ' fue actualizada');

        return redirect()->route('active-pages.index');
    }
    
}
