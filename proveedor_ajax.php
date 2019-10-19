<?php
 
require_once("conn/conexion.php");
		
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	include 'pagination.php'; //incluir el archivo de paginación
	
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM PROVEEDORES");
		
  /*  
   for ($i=0;$i<$count_query;$i++){
		$numeros[$i]=;
	 } 
*/
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}

		$reload = 'index.php';
		//consulta principal para recuperar los datos
   $sql ='SELECT t1.ID_PROVEEDOR, t1.ID_USR, t1.PROVEEDOR, t1.DESCRIPCION, t1.TELEFONO, 
     t1.CORREO, t1.DIRECCION, t1.ESTATUS,t1.FECHA_REG
   FROM
    PROVEEDORES as t1';
		$query = mysqli_query($con,$sql);
		
		if ($numrows>0){
			?>
		<table ID="example1" class="table table-bordered">
			  <thead>
				<tr>
				<th>Proveedor</th>
        <th>Descripción</th>
        <th>Teléfono</th>
        <th>Correo</th>
				<th>Dirección</th>
        <th>Ingreso</th>
        <th>Estatus</th>
		<th>Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
			
					<td><?php echo $row['PROVEEDOR'];?></td>
					<td><?php echo $row['DESCRIPCION'];?></td>
                    <td><?php echo $row['TELEFONO'];?></td>
                    <td><?php echo $row['CORREO'];?></td>
										<td><?php echo $row['DIRECCION'];?></td>
                    <td><?php echo $row['FECHA_REG'];?></td>
										<td>
										<?php  
										if ($row['ESTATUS']==1){
											echo 'ACTIVO';
										}
										else{
											echo 'INACTIVO';
										}
										;?>
										</td>
					<td>
                        <button type="button" class="btn btn-info" data-toggle="modal" 
												data-target="#dataUpdate" 
												data-id="<?php echo $row['ID_PROVEEDOR']?>" 
												data-usr="<?php echo $row['ID_USR']?>" 
                        data-prove="<?php echo $row['PROVEEDOR']?>"
												data-descrip="<?php echo $row['DESCRIPCION']?>" 
												data-tel="<?php echo $row['TELEFONO']?>" 
												data-correo="<?php echo $row['CORREO']?>"
												data-dir="<?php echo $row['DIRECCION']?>"
												data-estatus="<?php echo $row['ESTATUS']?>"
                         
                         ><i class='glyphicon glyphicon-edit'></i> Modificar</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['ID_PROVEEDOR']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
					</td>
				</tr>
				<?php
            }
						mysqli_close($con);
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
?>
  <script>
  $(function () {
    $("#example1").DataTable();
  });
</script>