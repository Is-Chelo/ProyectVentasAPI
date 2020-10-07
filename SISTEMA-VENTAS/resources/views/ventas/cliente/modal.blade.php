<!-- Modal -->
<div class="modal fade" id="modal-id-{{ $per->idpersona }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <form action="{{ route('cliente.destroy', $per->idpersona) }}" method="POST">
    @csrf  
    @method('DELETE')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Eliminar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Confirme si desea Eliminar el Cliente
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Confirmar">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </form>
</div>