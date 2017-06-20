<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use Styde\Html\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AssignedNotesController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $notes = Note::where('reporter_id', $id)
                ->paginate(15);
        return view('assigned-notes.list', compact('notes'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);

        $area = Area::pluck('name', 'id');

        return view('assigned-notes.edit', compact('note', 'area'));
    }

    public function update($id)
    {
        $note = Note::findOrFail($id);
        $note->fill(request()->all());
        $note->save();

        Alert::success('Note '. $note->title . ' fue actualizada');
        return redirect()->route('assigned-notes.index');
    }

    public function correction($id)
    {
        $note = Note::findOrFail($id);
        $note->fill(request()->all());
        $note->save();
        Alert::success('Note '. $note->title . ' fue enviada para corrección');
        return redirect()->route('assigned-notes.index');
    }
}
