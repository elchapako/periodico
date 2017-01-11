<?php

namespace App\Http\Controllers;

use App\Area;
use App\Note;
use App\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::paginate(15);
        return view('notes.list', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return view('notes.create', compact('areas', 'users'));
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
            'title' => ['required', 'max:60'],
            'area_id' => ['required'],
            'reporter_id'=> ['required'],
        ]);

        $note = request()->all();
        Note::create($note);
        return redirect()->to('notes');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
