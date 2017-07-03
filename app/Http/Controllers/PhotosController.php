<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Styde\Html\Facades\Alert;
use Intervention\Image\Facades\Image;

class PhotosController extends Controller
{
    public function index()
    {
        $photos = Photo::paginate(15);
        return view('photos.list', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50'],
            'image' => ['required', 'image:jpg,png,jpeg']
        ]);


        $file = Input::file('image');
        //Creamos una instancia de la libreria instalada
        $image = Image::make(Input::file('image'));
        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/photos/';

        // Guardar Original
        $image->save($path.$file->getClientOriginalName());
        // Cambiar de tamaño
        $image->resize(240,200);
        // Guardar
        $image->save($path.'thumb_'.$file->getClientOriginalName());

        //Guardamos nombre y nombreOriginal en la BD
        $photo = new Photo();
        $photo->name = Input::get('name');
        $photo->image = $file->getClientOriginalName();
        $photo->save();

        Alert::success('Foto ' . $photo->name . ' fue creada');

        return redirect()->route('photos.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.edit', compact('photo'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50']
        ]);

        $photo = Photo::findOrFail($id);

        If(Input::file('image') == null){
            $photo->fill(request()->only('name'));
            $photo->save();
            return redirect()->route('photos.index');
        }else{

            $name = $photo->image;
            File::delete(public_path().'/photos/'.$name);
            File::delete(public_path().'/photos/'.'thumb_'.$name);

            $file = Input::file('image');
            //Creamos una instancia de la libreria instalada
            $image = Image::make(Input::file('image'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/photos/';

            // Guardar Original
            $image->save($path.$file->getClientOriginalName());
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$file->getClientOriginalName());

            //Guardamos nombre y nombreOriginal en la BD
            $photo->name = Input::get('name');
            $photo->image = $file->getClientOriginalName();
            $photo->save();

            Alert::success('Foto ' . $photo->name . ' fue actualizada');

            return redirect()->route('photos.index');
        }
    }

    public function destroy($id)
    {
        $photo= Photo::findOrFail($id);
        $photo->delete();

        $name = $photo->image;
        File::delete(public_path().'/photos/'.$name);
        File::delete(public_path().'/photos/'.'thumb_'.$name);

        Alert::success('Foto ' . $photo->name . ' fue eliminada');
        return redirect()->route('photos.index');
    }
}
