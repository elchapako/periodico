<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Model;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Model::all();
        return view('models.list', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $path = public_path().'/storage/';

        // Guardar Original
        $image->save($path.$file->getClientOriginalName());
        // Cambiar de tamaño
        $image->resize(240,200);
        // Guardar
        $image->save($path.'thumb_'.$file->getClientOriginalName());

        //Guardamos nombre y nombreOriginal en la BD
        $model = new Model();
        $model->name = Input::get('name');
        $model->image = $file->getClientOriginalName();
        $model->save();

        return redirect()->to('models');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Model::findOrFail($id);
        return view('models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50']
        ]);

        $model = Model::findOrFail($id);
        
        If(Input::file('image') == null){
            $model->fill(request()->only('name'));
            $model->save();
            return redirect()->to('models');
        }else{

            $name = $model->image;
            File::delete(public_path().'/storage/'.$name);
            File::delete(public_path().'/storage/'.'thumb_'.$name);

            $file = Input::file('image');
            //Creamos una instancia de la libreria instalada
            $image = Image::make(Input::file('image'));
            //Ruta donde queremos guardar las imagenes
            $path = public_path().'/storage/';

            // Guardar Original
            $image->save($path.$file->getClientOriginalName());
            // Cambiar de tamaño
            $image->resize(240,200);
            // Guardar
            $image->save($path.'thumb_'.$file->getClientOriginalName());

            //Guardamos nombre y nombreOriginal en la BD
            $model->name = Input::get('name');
            $model->image = $file->getClientOriginalName();
            $model->save();

            return redirect()->to('models');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= Model::findOrFail($id);
        $model->delete();

        $name = $model->image;
        File::delete(public_path().'/storage/'.$name);
        File::delete(public_path().'/storage/'.'thumb_'.$name);

        Session::flash('message', $model->name . ' fue eliminada');
        return redirect()->route('models.index');
    }
}
