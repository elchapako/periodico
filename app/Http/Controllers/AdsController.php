<?php

namespace App\Http\Controllers;

use App\Ad;

use App\Client;
use App\Section;
use App\Size;


use App\Http\Requests;
use Styde\Html\Facades\Alert;


class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::paginate(15);
        return view('ads.list', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::pluck('name', 'id');
        $sizes = Size::pluck('size', 'id');
        $clients = Client::pluck('full_name', 'id');
        return view('ads.create', compact('sizes', 'sections', 'clients'));
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
            'name' => ['required', 'max:50'],
            'color' => ['required'],
            'section_id' => ['required'],
            'size_id'=> ['required'],
            'client_id' => ['required']
        ]);

        $ad = request()->all();

        Ad::create($ad);

        Alert::success('Advertising fue creada');

        return redirect()->route('ads.index');
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
        $ad = Ad::findOrFail($id);

        $sections = Section::pluck('name', 'id');
        $sizes = Size::pluck('size', 'id');
        $clients = Client::pluck('full_name', 'id');

        return view('ads.edit', compact('ad', 'sections', 'sizes', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50'],
            'color' => ['required'],
            'section_id' => ['required'],
            'size_id'=> ['required'],
            'client_id' => ['required']
        ]);

        $ad = Ad::findOrFail($id);
        $ad->fill(request()->all());
        $ad->save();

        Alert::success('Advertising '. $ad->name . ' fue actualizada');

        return redirect()->route('ads.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        Alert::success('Advertising '. $ad->name . ' fue eliminada');

        return redirect()->route('ads.index');
    }
}
