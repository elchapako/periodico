<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\ActivitylogFacade;
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

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $notes = $request->note;
        if ($request->titular==1){
            $titular = true;
            $title = 'Titular: ' . $note->title;
        }else{
            $titular = false;
            $title = str_replace('Titular: ', '', $note->title);
        }
        if ($request->photo==1){
            $photo = true;
        }else{
            $photo = false;
        }
        $note->fill([
           'note' => $notes,
           'titular' => $titular,
           'photo' => $photo,
           'title' => $title
        ]);
        $note->save();

        ActivitylogFacade::log('Editó noticia: '. $note->id);

        Alert::success('Note '. $note->title . ' fue actualizada');
        return redirect()->route('corrected-notes.index');
    }
}
