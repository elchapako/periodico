<?php

namespace App\Http\Controllers;

use App\Edition;

class EditionsController extends Controller
{
    public function index()
    {
        $editions = Edition::take(7)->OrderBy('created_at', 'DESC')->get();
        return view('editions.index', compact('editions'));
    }

    public function store()
    {
        Edition::createEdition();
        return redirect()->to('editions');
    }
}
