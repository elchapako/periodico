<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\User;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class CorrectedNotesController extends Controller
{
    public function index()
    {
        $notes = Note::where('status', 3)
            ->paginate(15);
        return view('corrected-notes.list', compact('notes'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);

        $area = Area::pluck('name', 'id');
        $reporter = User::pluck('name', 'id');

        return view('corrected-notes.edit', compact('note', 'area', 'reporter'));
    }

    public function update($id)
    {
        $note = Note::findOrFail($id);
        $note->fill(request()->all());
        $note->save();

        Alert::success('Note '. $note->title . ' fue actualizada');
        return redirect()->route('corrected-notes.index');
    }
}