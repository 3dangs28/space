<?php
  
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM ARTICULOS");

		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
        //consulta principal para recuperar los datos
        $sql = 'SELECT t1.ID_ARTICULO,t1.ID_CAT, t1.NOMBRE,t1.DESCRIPCION, t2.NOMBRE_CAT,t1.CANTIDAD, t1.PRECIO, t1.IMG_RUTA, t1.ESTATUS
				
				FROM ARTICULOS as t1, CATEGORIAS as t2 WHERE t1.ID_CAT = t2.ID_CAT;';
		$query = mysqli_query($con,$sql);

		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
		        <th>Nombre</th>
						<th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio</th>
		      	<th>Estatus</th>	
						<th>modificar</th>
						<th>subir,eliminar</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr> 
	      	<td><?php echo $row['NOMBRE'];?></td>
					<td><?php echo $row['NOMBRE_CAT'];?></td>
					<td><?php echo $row['CANTIDAD'];?></td>
					<td><?php echo $row['PRECIO'];?></td>
				
					<td>
		
					<?php  
										if ($row['ESTATUS']==1){
											echo 'ACTIVO '.'<a href="img/productos/'.$row['IMG_RUTA'].'">'.$row['IMG_RUTA'].'</a>';	
										}
										else{
											echo 'INACTIVO '.'<a href="img/productos/'.$row['IMG_RUTA'].'">'.$row['IMG_RUTA'].'</a>';	
										}
									
										?>	
		
					 </td>
					 <td>
					 <form action="prueba.php" method="get" >
						<input  type="hidden" name="codigo" id="codigo" value="<?php echo $row['ID_ARTICULO']?>" readonly >
						<button type="submit"><i class='nav-icon fa fa-pencil'></i></button>
					</form>    
					</td>
					<td>

					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpload" data-id="<?php echo $row['ID_ARTICULO']?>"  ><i  class='nav-icon fa fa-image'  ></i></button>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_ARTICULO']?>"  ><i class='nav-icon fa fa-trash' ></i></button>
					</td>
				</tr>
				<?php
			}
		
			?>
			</tbody>
		</table>
	

			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}

	}
	mysqli_close($con);
?>
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>