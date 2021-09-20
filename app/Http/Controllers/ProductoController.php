<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre_producto'=>'required|between:3,100','valor'=>'required|numeric|min:0'],['nombre_producto.required'=>'El Nombre del Producto es obligatorio.','nombre_producto.between'=>'El Nombre del Producto debe tener entre 3 y 100 caracteres.','valor.required'=>'El Valor del producto es obligatorio','valor.min'=>'El Valor del Producto debe ser mayor o igual a 0.','valor.numeric'=>'El Valor del Producto debe ser un número.']);
        $productos = new Producto();
        $productos->id = $request->get('id');
        $productos->nombre_producto = $request->get('nombre_producto');
        $productos->valor = $request->get('valor');
        $productos->fecha_expiracion = $request->get('fecha_expiracion');

        $productos->save();

        return redirect('/productos');
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
        $producto = Producto::find($id);
        return view('producto.edit')->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['nombre_producto'=>'required|between:3,100','valor'=>'required|numeric|min:0'],['nombre_producto.required'=>'El Nombre del Producto es obligatorio.','nombre_producto.between'=>'El Nombre del Producto debe tener entre 3 y 100 caracteres.','valor.required'=>'El Valor del producto es obligatorio','valor.min'=>'El Valor del Producto debe ser mayor o igual a 0.','valor.numeric'=>'El Valor del Producto debe ser un número.']);

        $producto = Producto::find($id);
        $producto->nombre_producto = $request->get('nombre_producto');
        $producto->valor = $request->get('valor');
        $producto->fecha_expiracion = $request->get('fecha_expiracion');

        $producto->save();

        return redirect('/productos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect('/productos');
    }
}
