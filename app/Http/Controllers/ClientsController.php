<?php

namespace App\Http\Controllers;

use App\Client;

use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->paginate(15);
        return view('clients.list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'full_name' => ['required', 'max:50'],
            'phone' => ['integer'],
            'cellphone' => ['integer'],
            'ci' => ['required', 'max:12'],
            'address' => ['required'],
            'email' => ['email']
        ]);

        $client = request()->all();

        Client::create($client);

        return redirect()->to('clients');
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
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
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
            'full_name' => ['required', 'max:50'],
            'phone' => ['integer'],
            'cellphone' => ['integer'],
            'ci' => ['required', 'max:12'],
            'address' => ['required'],
            'email' => ['email']
        ]);

        $client= Client::findOrFail($id);
        $client->fill(request()->all());
        $client->save();
        return redirect()->to('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client= Client::findOrFail($id);

        $client->delete();

        Session::flash('message', 'Client '. $client->full_name . ' fue eliminada');

        return redirect()->route('clients.index');
    }
}
