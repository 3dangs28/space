<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['prove'])){
			$errors[] = "Nombre vacío";
		} 
		else if (empty($_POST['descrip'])){
			$errors[] = "Descripción vacía";
		} 
		else if (empty($_POST['tel'])){
			$errors[] = "Teléfono vacío";
		} 
	 
		else if (empty($_POST['correo'])){
			$errors[] = "Correo vacío";
		} 
		else if (empty($_POST['dir'])){
			$errors[] = "Dirección vacío";
		} 
		else if (
			!empty($_POST['prove']) && 
			!empty($_POST['descrip']) &&
			!empty($_POST['tel']) && 
			!empty($_POST['correo']) &&  
			!empty($_POST['dir'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$usuario=1;	
		$prove=mysqli_real_escape_string($con,(strip_tags($_POST["prove"],ENT_QUOTES)));
		$descrip=mysqli_real_escape_string($con,(strip_tags($_POST["descrip"],ENT_QUOTES)));
		$tel=mysqli_real_escape_string($con,(strip_tags($_POST["tel"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$dir=mysqli_real_escape_string($con,(strip_tags($_POST["dir"],ENT_QUOTES)));
		$estatus = 1;

		$sql="INSERT INTO PROVEEDORES  (ID_USR, PROVEEDOR, DESCRIPCION, TELEFONO, CORREO, DIRECCION, ESTATUS, FECHA_REG )
		 VALUES ('".$usuario."','".$prove."','".$descrip."','".$tel."','".$correo."','".$dir."','".$estatus."',SYSDATE()
		 )";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido guardados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

			mysqli_close($con);
?>