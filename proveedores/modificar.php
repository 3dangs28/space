<?php


require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID vacío";
		}
		else if (empty($_POST['prove'])){
			$errors[] = "Nombre vacío";
		} 
		else if (empty($_POST['descrip'])){
			$errors[] = "Descripción vacío";
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
		else if (empty($_POST['usr'])){
			$errors[] = "Usuario vacío";
		} 
		else if (empty($_POST['estatus'])){
			$errors[] = "Estatus vacío";
		} 
		else if (
			!empty($_POST['id']) && 
			!empty($_POST['prove']) && 
			!empty($_POST['descrip']) &&
			!empty($_POST['correo']) &&
			!empty($_POST['tel']) &&  
			!empty($_POST['dir']) &&  
			!empty($_POST['usr']) &&  
			!empty($_POST['estatus'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$prove=mysqli_real_escape_string($con,(strip_tags($_POST["prove"],ENT_QUOTES)));
		$descrip=mysqli_real_escape_string($con,(strip_tags($_POST["descrip"],ENT_QUOTES)));
		$correo=mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));
		$tel=mysqli_real_escape_string($con,(strip_tags($_POST["tel"],ENT_QUOTES)));
		$dir=mysqli_real_escape_string($con,(strip_tags($_POST["dir"],ENT_QUOTES)));
		$usr=intval($_POST['usr']);
		$estatus=mysqli_real_escape_string($con,(strip_tags($_POST["estatus"],ENT_QUOTES)));

		$id=intval($_POST['id']);
		$sql="UPDATE PROVEEDORES SET  PROVEEDOR='".$prove."', DESCRIPCION='".$descrip."', TELEFONO='".$tel."', CORREO='".$correo."', DIRECCION='".$dir."', ESTATUS='".$estatus."'	WHERE ID_PROVEEDOR='".$id."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
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

?>