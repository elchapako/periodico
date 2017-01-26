<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\Notifications\NoteAssigned;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::paginate(15);
        return view('notes.list', compact('notes'));
    }

    public function create()
    {
        $areas = Area::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return view('notes.create', compact('areas', 'users'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => ['required', 'max:60'],
            'area_id' => ['required'],
            'reporter_id'=> ['required'],
        ]);

        $note = request()->all();
        Note::create($note);

        return redirect()->to('notes');
    }
}
