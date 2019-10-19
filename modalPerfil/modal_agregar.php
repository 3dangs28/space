<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar perfiles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>
      
          <div class="form-group">
            <label for="perfil0" class="control-label">Perfil:</label>
            <input type="text" class="form-control" id="perfil0" name="perfil" placeholder="Nombre del perfil" required autocomplete="off" >
		  </div>
		  <div class="form-group">
            <label for="nombre0" class="control-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Escriba la descripción del perfil"  autocomplete="off"></textarea>
          </div>
	 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar datos</button>

       
      </div>
    </div>
  </div>
</div>
</form>