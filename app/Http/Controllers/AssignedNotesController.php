<?php

namespace App\Http\Controllers;

use App\Note;
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
}
