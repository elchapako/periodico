<?php

namespace App\Http\Controllers;

use App\Area;
use App\Edition;
use App\Model;
use App\Note;
use App\Page;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ActivePagesController extends Controller
{
    public function index()
    {
        $activeEdition = Edition::active()->with('editionsection.section', 'editionsection.pages.area', 'editionsection.pages.notes', 'editionsection.pages.ads.size')->first();
        return view('active-pages.list', compact('activeEdition'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $areas = Area::pluck('name', 'id');
        $models = Model::pluck('name', 'id');
        return view('active-pages.edit', compact('page', 'areas', 'models'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'area_id' => ['required'],
            'model_id'=> ['required'],
        ]);

        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        Alert::success('Page '. $page->page_number . ' fue actualizada');

        return redirect()->route('active-pages.index');
    }

    public function addNotes($id)
    {
        $page = Page::findOrFail($id);
        if ($page->area_id==null){
            $notes = Note::corrected()->pluck('title', 'id');
        }else{
            $notes = Note::corrected()->where('area_id', $page->area_id)->pluck('title', 'id');
        }

        return view('active-pages.addnotes', compact('page', 'notes'));
    }

    public function updateNotes(Request $request, $id)
    {
        $this->validate(request(), [
            'note_id' => ['required'],
        ]);
        $page = Page::findOrFail($id);
        $page->changeStatusAddingNotes();
        $page->save();
        $notes= $request->note_id;

        for ($i=0; $i<count($notes); $i++){
            $note = Note::findOrFail($notes[$i]);
            $note->changeStatusSelected();
            $note->page_id = $page->id;
            $note->save();
        }

        Alert::success('Notas fueron asignadas');
        return redirect()->route('active-pages.index');
    }

    public function addedNotes($id)
    {
        $page = Page::findOrFail($id);

        if($page->hasModelAndArea() && $page->hasNotes() && $page->status == 2){
            $page->fill(request()->all());
            $page->save();
            Alert::success('Page '. $page->page_number . ' esta lista');
            return redirect()->route('active-pages.index');
        }else{
            Alert::info('Page '. $page->page_number . ' tiene que tener modelo, área y noticia para estar lista');
            return redirect()->route('active-pages.index');
        }


    }
}
