<?php

namespace App\Http\Controllers;

use App\Models\Envios;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $envio = Envios::all();

        return Inertia::render(
            'Envios/Index',
            [
                'envios' => $envio
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Envios/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idcliente' => 'required',
            'idpaquete' => 'required',
            'domicilio' => 'required',
            'envio' => 'required'
        ]);
        Envios::create([
            'idcliente' => $request->idcliente,
            'idpaquete' => $request->idpaquete,
            'domicilio' => $request->domicilio,
            'envio' => $request->envio
        ]);
        sleep(1);
        return redirect()->route('envios.index')->with('message', 'Envios Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Envios  $envios
     * @return \Illuminate\Http\Response
     */
    public function show(Envios $envio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Envios  $envios
     * @return \Illuminate\Http\Response
     */
    public function edit(Envios $envio)
    {
        return Inertia::render(
            'Envios/Edit',
            [
                'envios' => $envio
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Envios  $envios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Envios $envio)
    {
        $request->validate([
            'idcliente' => 'required',
            'idpaquete' => 'required',
            'domicilio' => 'required',
            'envio' => 'required'
        ]);

        $envio->idcliente = $request->idcliente;
        $envio->idpaquete = $request->idpaquete;
        $envio->domicilio = $request->domicilio;
        $envio->envio = $request->envio;
        $envio->save();
        sleep(1);
        return redirect()->route('envios.index')->with('message', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Envios  $envios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Envios $envio)
    {
        $envio->delete();
        sleep(1);
        return redirect()->route('envios.index')->with('message', 'Book Delete Successfully');
    }
}
