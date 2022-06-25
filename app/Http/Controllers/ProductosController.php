<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\evaluaciones;
use App\Models\Productos;
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
        $productos = Productos::with('categoria')->with('evaluaciones')->where('eliminado', 'No')->take(10)->get();

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
        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = public_path('img/thumbnails/');
            $producto = Productos::create($request->post());
            $nombre_imagen = 'thumbnail'.$producto->id.'.jpg';
            copy($imagen->getRealPath(), $ruta . $nombre_imagen);
            $producto->imagen = $nombre_imagen;
            $producto->save();
        }else{
            $producto = Productos::create($request->post());
        }

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

        $suma = 0;
        $producto->categorias = $producto->categoria->categoria;
        $evalua = 0;
        foreach ($producto->evaluaciones as $evaluaciones) {
            $suma += $evaluaciones->evaluacion;
        }

        if (sizeof($producto->evaluaciones))
            $evalua = $suma / sizeof($producto->evaluaciones);

        $producto->evaluacion = $evalua;

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

        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $ruta = public_path('img/thumbnails/');
            $producto->fill($request->post())->save();
            $nombre_imagen = 'thumbnail'.$producto->id.'.jpg';
            copy($imagen->getRealPath(), $ruta . $nombre_imagen);
            $producto->imagen = $nombre_imagen;
            $producto->save();
        }else{
            $producto->fill($request->post())->save();
        }


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

        $producto->eliminado = 'Si';
        $producto->save();

        return response()->json([
            'message' => 'El producto se elimino correctamente'
        ]);
    }

    /* se crea metodo para evaluar los productos */
    public function calificar(Request $request, $id)
    {
        $evaluacion = new evaluaciones();
        $evaluacion->id_producto = $id;
        $evaluacion->evaluacion = $request->get('evaluacion');

        $evaluacion->save();

        return response()->json([
            'message' => 'success'
        ]);
    }
}
