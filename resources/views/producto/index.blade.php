@extends('layouts.plantillabase')

@section('contenido')
<h1 class="fw-normal h2 mb-3">Listado de Productos</h1>

<table class="table table-striped table-hover">
    <thead class="table-success">
        <tr class="text-center">
            <th scope="col">#Id</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Valor</th>
            <th scope="col">Expiración</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $item)
        <tr class="text-center">
            <td class="align-middle">{{$item->id}}</td>
            <td class="align-middle">{{$item->nombre_producto}}</td>
            <td class="align-middle">${{$item->valor}}</td>
            @if($item->fecha_expiracion)
            <td class="align-middle">{{date('d/m/Y', strtotime($item->fecha_expiracion))}}</td>
            @else
            <td class="align-middle">--</td>
            @endif
            <td><a href="productos/{{$item->id}}/edit" class="btn btn-outline-success btn-sm">Editar</a>
            </td>
            <td>
                <button type="button" class="btn btn-outline-danger btn-sm " data-bs-toggle="modal" data-bs-target="#mensaje_eliminar_{{$item->id}}">Eliminar</button>
            </td>
        </tr>
        @include('producto.modal_eliminar')
        @endforeach
    </tbody>
</table>
@endsection