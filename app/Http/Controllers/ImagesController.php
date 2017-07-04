<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use Illuminate\Support\Facades\Input;

class ImagesController extends Controller
{
    public function create($id)
    {
        $album = Album::find($id);
        return view('images.create', compact('album'));
    }

    public function store()
    {
        $this->validate(request(), [
            'album_id' => ['required', 'numeric'],
            'image' => ['required', 'image']
        ]);

        $file = Input::file('image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_album_image.'.$extension;
        $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
        Image::create(array(
            'description' => Input::get('description'),
            'image' => $filename,
            'album_id'=> Input::get('album_id')
        ));
        return redirect()->route('albums.show', array('id' => Input::get('album_id')));
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect()->route('albums.show', array('id' => $image->album_id));
    }

    public function postMove()
    {
        $this->validate(request(), [
            'new_album' => ['required', 'numeric'],
            'photo' => ['required', 'numeric']
        ]);

        $image = Image::find(Input::get('photo'));
        $image->album_id = Input::get('new_album');
        $image->save();
        return redirect()->route('albums.show', array('id' => Input::get('new_album')));
    }
}
