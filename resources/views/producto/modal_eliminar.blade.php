<div class="modal fade" id="mensaje_eliminar_{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mt-3">
                <h4 class="text-center p-3">¿Deseas eliminar el producto {{$item->nombre_producto}} del listado?</h4>
                <h5 class="text-center font-weight-light">(Esta accion no podrá deshacerse)</h5>
            </div>
            <div class="modal-footer align-middle">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                <form action="{{route('productos.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>