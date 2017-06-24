<?php

namespace App\Http\Controllers;

use App\Ad;

use App\Client;
use App\Date;
use App\Section;
use App\Size;


use Illuminate\Http\Request;
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
        $dates = '';
        return view('ads.create', compact('sizes', 'sections', 'clients', 'dates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'max:50'],
            'color' => ['required'],
            'section_id' => ['required'],
            'size_id'=> ['required'],
            'client_id' => ['required'],
            'dates'     => ['required']
        ]);

        $ad = Ad::create([
            'name' => $request->name,
            'color' => $request->color,
            'section_id' => $request->section_id,
            'size_id' => $request->size_id,
            'client_id' => $request->client_id
        ]);

        $dates = $request->dates;
        $arrayDates = explode(',', $dates);
        for ($i=0; $i<count($arrayDates); $i++){
            $date = Date::create([
                'dates' => $arrayDates[$i]
            ]);
            $ad->dates()->save($date);
        }

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

        $ads = Ad::find($id);
        $dates = implode($ads->dates()->pluck('dates')->toArray(), ',');

        return view('ads.edit', compact('ad', 'sections', 'sizes', 'clients', 'dates'));
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
