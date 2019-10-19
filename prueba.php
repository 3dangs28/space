<?php 
 include("inc/librerias.php");


require_once("conn/conexion.php");
?>
	 
  
     <script>
function goBack() {
  window.history.back();
}
</script>

     <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <img src="img/iconos/logo.png" >

    </aside>



<div class="content-wrapper">


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Modificar artículos</h1>
          </div>
          <div class="col-sm-6">
					<h3 class='text-right'>		
				<button type="button" class="btn btn-success"  onclick="goBack()"><i class='glyphicon glyphicon-plus'></i>Regresar</button>
			</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<?php 
$codigo = $_GET['codigo'];

$sql = 'SELECT t1.ID_ARTICULO,t1.ID_CAT, t1.NOMBRE,t1.DESCRIPCION, t2.NOMBRE_CAT,t1.CANTIDAD, t1.PRECIO, t1.IMG_RUTA, t1.ESTATUS
				
FROM ARTICULOS as t1, CATEGORIAS as t2 WHERE t1.ID_CAT = t2.ID_CAT AND t1.ID_ARTICULO="'.$codigo.'"';


$query = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($query)){

$nombre= $row['NOMBRE'];
$descri =  $row['DESCRIPCION'];
$precio =  $row['PRECIO'];
$cantidad =  $row['CANTIDAD'];
$estatus =  $row['ESTATUS'];

}




?>


<section class = "content">
  
     
<form id="actualidarDatos">

   

<div class="form-group">
      <label for="nombre0" class="control-label">Categoría:</label>
                              <?php 
                                 $query = mysqli_query($con,"SELECT * FROM CATEGORIAS WHERE ESTATUS=1");
                              ?>
                     
                             <select class="form-control" id="cate" name="cate" required>
            
                             <?php  while($row = mysqli_fetch_array($query)){  ?>    
                            <?php     echo "<option value=".$row['ID_CAT'].">".$row['NOMBRE_CAT']."</option>";
                             }
                             mysqli_close($con);
                             ?>
                     
                     
                        </select>
       </div>






          <div class="form-group">
            <label for="codigo" class="control-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del item" value="<?php echo $nombre;?>" required maxlength="2">
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $codigo;?>">
          </div>

        
          <div class="form-group">
         <label for="nombre1" class="control-label">Descripcion:</label>
           <input type="text" class="form-control" id="descri" name="descri" placeholder="Escriba la descripción:" value="<?php echo $descri;?>"   required autocomplete="off"   >
        </div>

                                           
        <div class="form-group">
         <label for="nombre0" class="control-label">Cantidad:</label>
           <input type="number" step="1" class="form-control" id="cantidad" name="cantidad"  value="<?php echo $cantidad;?>" placeholder="Escriba la cantidad:" required autocomplete="off"   >
        </div>


        
        <div class="form-group">
         <label for="nombre1" class="control-label">Precio:</label>
           <input type="number" step="0.01"  class="form-control" id="precio" name="precio"  value="<?php echo $precio;?>" placeholder="Escriba el precio:" required autocomplete="off"   >
        </div>


        <div class="form-group">
          <label for="lalo"  class="control-label">Estatus</label>
				                            <select class="form-control" id="estatus" name="estatus"  required>
                                            <?php 
                                            if ($estatus==1){
                                                ?>  <option value="1"  selected>Activo</option>
                                                    <option value="2">Inactivo</option>
                                            <?php  }else{
                                                ?>  <option value="1"  >Activo</option>
                                                    <option value="2" selected>Inactivo</option>
                                                    <?php        
                                            }
                                            ?>
				                            
				                            </select>
				                </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
      </div>
    </div>

</form>



</section>
</div>
  <!-- /.content-wrapper -->






