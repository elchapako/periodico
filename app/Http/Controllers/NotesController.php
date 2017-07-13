<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\NoteStatus;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\ActivitylogFacade;
use Styde\Html\Facades\Alert;

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
        $users = User::whereIs('reporter')->get()->pluck('name', 'id');
        return view('notes.create', compact('areas', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => ['required', 'max:60'],
            'area_id' => ['required'],
            'reporter_id'=> ['required'],
        ]);

        $note = Note::create([
            'title' => $request->title,
            'area_id' => $request->area_id,
            'reporter_id' => $request->reporter_id,
            'status' => NoteStatus::ASSIGNED
        ]);

        Alert::success('Note fue creada');
        ActivitylogFacade::log('Asignó noticia: '. $note->id . ' a ' . $note->reporter->name);

        return redirect()->route('notes.index');
    }
}
