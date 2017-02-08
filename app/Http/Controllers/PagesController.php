<?php

namespace App\Http\Controllers;

use App\Area;
use App\Page;
use App\Section;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('pages.list', compact('pages'));
    }

    public function create()
    {
        $areas = Area::pluck('name', 'id');
        $sections = Section::pluck('name', 'id');
        return view('pages.create', compact('areas', 'sections'));
    }

    public function store()
    {
        $this->validate(request(), [
            'area_id' => ['required'],
            'section_id' => ['required']
        ]);
        $page = request()->all();
        Page::create($page);
        return redirect()->route('pages.index');
    }
}
