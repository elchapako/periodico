<?php

namespace App\Http\Controllers;

use App\Note;
use App\Page;
use Illuminate\Support\Facades\Input;
use Styde\Html\Facades\Alert;

class DesignerController extends Controller
{
    public function index()
    {
        $pages = Page::statusAddedPhotos()->with('notes', 'editionsection.section', 'ads.size')->get();
        return view('design-pages.list', compact('pages'));
    }

    public function showPage($id)
    {
        $page = Page::where('id', $id)->with('notes', 'ads', 'ads.size')->first();

        return view('design-pages.show-page', compact('page'));
    }

    public function store($id)
    {
        $this->validate(request(), [
            'template' => ['required', 'file:idml']
        ]);

        $page = Page::findOrFail($id);

        $file = Input::file('template');
        //Creamos una instancia de la libreria instalada
        $random_name = str_random(8);
        $original_name = $file->getClientOriginalName();
        $name = $random_name.$original_name;

        \Storage::disk('designed')->put($name, \File::get($file));

        $page->designed = $name;
        $page->save();

        Alert::success('Template fue guardada exitosamente');
        return redirect()->route('ready-pages-to-design.index');
    }

    public function designed($id)
    {
        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        Alert::success('Page '. $page->page_number . ' diseñada lista');
        return redirect()->route('photo-pages.index');
    }
}
