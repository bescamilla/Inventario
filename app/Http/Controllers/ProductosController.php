<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\Productos;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::with('categoria')->with('evaluaciones')->take(10)->get();

        return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categorias::all();

        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductosRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = Productos::create($request->post());
        return response()->json(
            ['producto' => $producto]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        return response()->json($productos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Productos::with('evaluaciones')->with('categoria')->where('id', $id)->first();

        $suma = 0; $producto->categorias = $producto->categoria->categoria;
        foreach ($producto->evaluaciones as $evaluaciones) {
            $suma += $evaluaciones->evaluacion;
        }

        $evalua = $suma / sizeof($producto->evaluaciones);

        if ($evalua > 0) {
            $producto->evaluacion = $evalua;
        }else{
            $producto->evaluacion = 0;
        }

        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductosRequest $request
     * @param  \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);

        $producto->fill($request->post())->save();

        return response()->json([
            'producto' => $producto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        return response()->json([
            'message' => 'El producto se elimino correctamente'
        ]);
    }
}
