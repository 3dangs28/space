<form id="guardarDatos">
<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      

    <div class="modal-header">
                    <h5 class="modal-title">Formulario para agregar proveedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


      <div class="modal-body">
      <div id="datos_ajax_register"></div>
      

             <div class="form-group">					
             <input type="text" class="form-control" id="prove" name="prove" placeholder="Nombre:" required autocomplete="off" >
            </div>

         <div class="form-group purple-border">
          <label for="lalo"  class="control-label">Descripción</label>
          <textarea class="form-control" id="descrip" name="descrip" rows="2" required autocomplete="off"></textarea>
       </div>

      
		     <div class="form-group">
            <input type="text" class="form-control" id="tel" name="tel" placeholder="Teléfono" required autocomplete="off" >
         </div>
      
         <div class="form-group">
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo:" required autocomplete="off" >
         </div>

   
         <div class="form-group">
         
            <input type="text" class="form-control" id="dir" name="dir" placeholder="Dirección:" required autocomplete="off" >
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