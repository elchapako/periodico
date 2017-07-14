<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\User;
use Styde\Html\Facades\Alert;

class ReviewingNotesController extends Controller
{
    public function index()
    {
        $notes = Note::where('status', 2)
            ->paginate(15);
        return view('reviewing-notes.list', compact('notes'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);

        $area = Area::pluck('name', 'id');
        $reporter = User::pluck('name', 'id');

        return view('reviewing-notes.edit', compact('note', 'area', 'reporter'));
    }

    public function update($id)
    {
        $note = Note::findOrFail($id);
        $note->fill(request()->all());
        $note->save();

        Alert::success('Note '. $note->title . ' fue actualizada');
        return redirect()->route('reviewing-notes.index');
    }

    public function corrected($id)
    {
        $note = Note::findOrFail($id);
        $note->fill(request()->all());
        $note->save();

        Alert::success('Note '. $note->title . ' fue corregida');
        return redirect()->route('reviewing-notes.index');
    }
}
