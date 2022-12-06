<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();

        return Inertia::render(
            'Productos/Index',
            [
                'productos' => $productos
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
            'Productos/Create'
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
            'name' => 'required',
            'namem' => 'required',
            'inventario' => 'required'
        ]);
        Productos::create([
            'name' => $request->name,
            'namem' => $request->namem,
            'inventario' => $request->inventario
        ]);
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Productos Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        return Inertia::render(
            'Productos/Edit',
            [
                'productos' => $productos
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $Productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        $request->validate([
            'name' => 'required',
            'namem' => 'required',
            'inventario' => 'required'
        ]);

        $productos->name = $request->name;
        $productos->namem = $request->namem;
        $productos->inventario = $request->inventario;
        $productos->save();
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Book Delete Successfully');
    }
}
