@extends('layouts.plantillabase')

@section('contenido')
<h1 class="fw-normal h2 mb-3">Editar Producto</h1>
<form action="/productos/{{$producto->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre Producto</span>
                <input type="text" class="form-control" placeholder="Shampoo" name="nombre_producto" value="{{$producto->nombre_producto}}">
            </div>
            @error('nombre_producto')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text">Valor</span>
                <input type="number" class="form-control" name="valor" value="{{$producto->valor}}">
            </div>
            @error('valor')
                    <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text">Fecha Expiración</span>
                <input type="date" class="form-control" name="fecha_expiracion" value="{{$producto->fecha_expiracion}}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Categoría</span>
                <select type="date" class="form-select" name="categoria">
                    <option value="Alimento">Alimento</option>
                    <option value="Linea Blanca">Linea Blanca</option>
                    <option value="Menaje">Menaje</option>
                </select>
            </div>
        </div>
    </div>

    <hr>

    <button type="submit" class="btn btn-success">Guardar Producto</button>
    <a href="/productos" class="btn btn-dark">Cancelar</a>
</form>

@endsection