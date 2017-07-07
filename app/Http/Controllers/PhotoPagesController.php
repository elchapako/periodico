<?php

namespace App\Http\Controllers;

use App\Note;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Styde\Html\Facades\Alert;

class PhotoPagesController extends Controller
{
    public function index()
    {
        $pages = Page::needPhoto()->with('notes', 'editionsection.section')->get();
        return view('photo-pages.list', compact('pages'));
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        $notes = Note::where('page_id', $page->id)->where('photo', 1)->get();

        return view('photo-pages.show', compact('notes'));
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
}
