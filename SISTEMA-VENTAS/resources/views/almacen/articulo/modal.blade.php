<!-- Modal -->
<div class="modal fade" id="modal-id-{{ $art->idarticulo }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <form action="{{ route('articulo.destroy', $art->idarticulo) }}" method="POST">
    @csrf  
    @method('DELETE')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Eliminar Articulo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Confirme si desea Eliminar el Articulo
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Confirmar">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </form>
</div>