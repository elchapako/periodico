<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

use App\Http\Requests;


class AreasController extends Controller
{
    public function list()
    {
        $areas = Area::all();
        return view('areas/list', compact('areas'));
    }

    public function create()
    {
        return view('areas/create');
    }

    public function store(Request $request)
    {
        $area = $request->all();

        Area::create($area);

        return redirect()->to('areas');
    }
}
