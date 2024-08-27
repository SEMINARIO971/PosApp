<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
      /*   $request->validate([
            'dpi' => 'required|unique:clients',
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'img' => 'required',
        ]);
 */
        $cliente = new Client( $request->validate([
            'dpi' => 'required|unique:clients',
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'img' => 'required',
            'address'=>'required'
        ]));

        $cliente->img= $request->file('img')->store('img','public');
         $cliente->save();

        return redirect()->route('clients.index')->with('success', 'Client created successfully.'); 

       /*  Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client created successfully.'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'dpi' => 'required|unique:clients,dpi,' . $client->id,
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }

    
}
