<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.list', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50'],
            'cover_image' => ['required', 'image']
        ]);

        $file = Input::file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = Input::file('cover_image')
            ->move($destinationPath, $filename);
        $album = Album::create(array(
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'cover_image' => $filename,
        ));
        return redirect()->route('albums.show', array('id' => $album->id));
    }

    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        $albums = Album::all();
        return view('albums.show', compact('album', 'albums'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('albums.index');
    }
}
