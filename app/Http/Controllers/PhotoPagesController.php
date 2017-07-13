<?php

namespace App\Http\Controllers;

use App\Note;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Spatie\Activitylog\ActivitylogFacade;
use Styde\Html\Facades\Alert;

class PhotoPagesController extends Controller
{
    public function index()
    {
        $pages = Page::whereHas('notes', function ($query){
            $query->where('photo', true);
        })->withCount(['notes' => function($query){
            $query->where('image', null);
        }])->statusAddedNotes()->with('notes', 'editionsection.section')->get();
        return view('photo-pages.list', compact('pages'));
    }

    public function showNotes($id)
    {
        $page = Page::findOrFail($id);
        $notes = Note::where('page_id', $page->id)->where('photo', 1)->get();

        return view('photo-pages.show-notes', compact('notes'));
    }

    public function photoNote($id)
    {
        $note = Note::findOrFail($id);
        return view('photo-pages.photo-note', compact('note'));
    }

    public function store($id)
    {
        $this->validate(request(), [
            'image' => ['required', 'image:jpg,png,jpeg']
        ]);

        $note = Note::findOrFail($id);

        $file = Input::file('image');
        //Creamos una instancia de la libreria instalada
        $image = Image::make(Input::file('image'));
        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/photos/';

        // Guardar Original
        $image->save($path.$file->getClientOriginalName());

        $note->image = $file->getClientOriginalName();
        $note->save();

        Alert::success('Foto fue guardada exitosamente');
        return redirect()->route('photo-pages.index');
    }

    public function addedPhotos($id)
    {
        $page = Page::findOrFail($id);
        $page->fill(request()->all());
        $page->save();

        ActivitylogFacade::log('Agregó fotos a página: '. $page->id);

        Alert::success('Page '. $page->page_number . ' con fotografias lista');
        return redirect()->route('photo-pages.index');
    }
}
