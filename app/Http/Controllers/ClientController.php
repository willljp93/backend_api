<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        //create object to store data
        $array = [];
        foreach ($clients as $client) {
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->address,
                'services' => $client->services
            ];
        }
        return response()->json($array);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        $data = [
            'menssage' => 'Cliente creado satifactoriamente',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
        $data = [
            'message' => 'Detalles del CLiente',
            'client' => $client,
            'services' => $client->services
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        $data = [
            'menssage' => 'Cliente actualizado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
        $data = [
            'menssage' => 'Cliente eliminado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }
    /**
     * añadir servicios a clientes.
     */
    public function attach(Request $request)
    {
        //
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        $data = [
            'menssage' => 'Servicio añadido correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }
    public function detach(Request $request)
    {
        //
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);
        $data = [
            'menssage' => 'Servicio eliminado correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }
}