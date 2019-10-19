<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <h5 class="modal-title">Modificar proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

      <div class="modal-body">
			<div id="datos_ajax"></div>
 
          <div class="form-group">
              <input type="text" class="form-control" id="prove" name="prove" placeholder="Nombre:" required autocomplete="off" >
              <input type="hidden" class="form-control" id="id" name="id">
              <input type="hidden" class="form-control" id="usr" name="usr">
          </div>


          <div class="form-group purple-border">
          <label for="lalo"  class="control-label">Descripción</label>
          <textarea class="form-control" id="descrip" name="descrip" rows="2" required autocomplete="off"></textarea>
         </div>

          <div class="form-group">
          <label for="lalo"  class="control-label">Teléfono</label>
          <input type="text" class="form-control" id="tel" name="tel" placeholder="Teléfono:" required autocomplete="off" >
          </div>




        <div class="form-group">
        <label for="lalo"  class="control-label">Correo</label>
           <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
        </div>
  
  
  
        <div class="form-group">
        <label for="lalo"  class="control-label">Dirección</label>
           <input type="text" class="form-control" id="dir" name="dir" placeholder="Dirección:" required autocomplete="off" >
        </div>
  
          <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus" required>
				                 
				                                <option value="1">Activo</option>
				                                <option value="2">Inactivo</option>

				                            </select>
				                </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>
  </div>
</div>
</form>