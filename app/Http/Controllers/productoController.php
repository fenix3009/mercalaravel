<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\producto;
use App\categoria;
use Auth;

class productoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $userid = Auth::user()->id;
        $listaProductos = producto::where('usuario_id', '!=', $userid)->get();
        foreach ($listaProductos as $producto) {
            $producto->categorias;
        }
        return $listaProductos->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $categorias = $request->input('categorias');
        $nombre = $request->input('nombre');
        $costo = $request->input('costo');
        $imagen = $request->input('imagen');
        $userid = Auth::user()->id;

        $productoCreado = producto::create([
                    'nombre' => $nombre,
                    'costo' => $costo,
                    'imagen' => $imagen,
                    'usuario_id' => $userid
        ]);

        foreach ($categorias as $id) {
            $cat = categoria::find($id);
            $productoCreado->categorias()->save($cat);
        }

        return response()->json(['ECO' => "$nombre aregado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $producto = producto::find($id);
        $nombre = $producto->nombre;
        $costo = $producto->costo;
        $producto->delete();
        return response()->json(['ECO' => "Compraste $nombre por $costo euros"]);
    }

}
