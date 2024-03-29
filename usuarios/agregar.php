<?php
	# conectare la base de datos

	require_once("../conn/conexion.php");

	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['perfil'])){
			$errors[] = "Perfil vacío";
		} 
		else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} 
		else if (empty($_POST['apellido'])){
			$errors[] = "Apellido vacío";
		} 
	 
		else if (empty($_POST['usr'])){
			$errors[] = "Usuario vacío";
		} 
		else if (empty($_POST['pass'])){
			$errors[] = "Contraseña vacío";
		} 
		else if (
			!empty($_POST['perfil']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['apellido']) && 
			!empty($_POST['usr']) &&  
			!empty($_POST['pass'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		
		$perfil=mysqli_real_escape_string($con,(strip_tags($_POST["perfil"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apel=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$usr=mysqli_real_escape_string($con,(strip_tags($_POST["usr"],ENT_QUOTES)));
		$pass=mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));
		$estatus = 1;

		$sql="INSERT INTO USUARIOS  (ID_PERFIL , NOMBRE, APELLIDO, USUARIO, CLAVE, ESTATUS, FECHA_REG )
		 VALUES ('".$perfil."','".$nombre."','".$apel."','".$usr."','".$pass."','".$estatus."',SYSDATE()
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