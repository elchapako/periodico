<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class AreasController extends Controller
{
    public function index()
    {
        $areas = DB::table('areas')->paginate(15);

        return view('areas.list', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50']
        ]);

        $area = request()->all();

        Area::create($area);

        return redirect()->to('areas');
    }

    public function edit($id)
    {
       $area = Area::findOrFail($id);
       return view('areas.edit', compact('area'));
    }

    public function update($id)
    {
            $this->validate(request(), [
                'name' => 'required', 'max:50',
            ]);
            $area= Area::findOrFail($id);
            $area->fill(request()->all());
            $area->save();
            return redirect()->to('areas');
    }

    public function show()
    {
        //no muestra nada
    }

    public function destroy($id)
    {
        $area= Area::findOrFail($id);

        $area->delete();

        Session::flash('message', 'Area '. $area->name . ' fue eliminada');

        return redirect()->route('areas.index');
    }
}
