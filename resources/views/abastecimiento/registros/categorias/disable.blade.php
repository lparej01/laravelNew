<div class="d-flex text-center gap-4 p-2 m-2">
    <div>
       <h5>¿Estás seguro de modificar el status dela categorías?</h5>
       <p>¡Al confirmar la solicitud se cambiara el status de la categorías!</p>
    </div>
 </div>
 
 <div class="d-flex justify-content-center gap-4 p-2 m-2">
    <div class="p-2 bd-highlight"><a class="btn btn-success" href="{{ route('categorias.disable_confirm',$categorias->catId) }}">Si</a></div>
    <div class="p-2 bd-highlight"><button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">No</button></div>
 </div>