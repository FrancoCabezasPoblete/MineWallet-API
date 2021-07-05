<?php
/* Este archivo debe validar los datos de registro y manejar la lógica de crear un usuario desde el formulario de registro */
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
	$nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
	$apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$pass = $_POST["password"];
	$pass2 = $_POST["pwd2"];
	if($pass == $pass2){
		$pais = $_POST["pais"];
		$fecha = date("Y-m-d H:i:s",strtotime("-4 hour")); // Se asigna la hora chilena

		$opciones = array('cost' => 12);
		$pw_hashed = password_hash($pass, PASSWORD_BCRYPT, $opciones); // Encriptamos la contraseña

		$id = pg_num_rows(pg_query("SELECT id FROM usuario"))+1; // Se asigna el siguiente valor de la id

		$sql = pg_query($dbconn,"SELECT * FROM usuario WHERE correo = '".$email."';");
		if(pg_num_rows($sql) > 0){
			include '../include/header.html';
			echo '<div class="container-fluid mt-3">
					<div class="row justify-content-md-center">
						<div class="col-4">
							<div class="alert alert-danger" role="alert">
								<h4 class="alert-heading">Error al registrar cuenta</h4>
								<p> Este correo ya esta asociado a una cuenta, por favor indique otro correo </p>
								<hr>
								<p class="mb-0"> Será redireccionado en 5 segundos </p>
							</div>
						</div>
					</div>
				</div>';
			header( "refresh:5; url=/sesion/sign-up.html" ); 
		} else {
			session_start();
			$sql2 = "INSERT INTO usuario (id,nombre, apellido, correo, contraseña, pais, fecha_registro, admin) VALUES($1,$2, $3, $4, $5, $6, $7, FALSE);";
			$res = pg_query_params($dbconn, $sql2, array($id,$nombre,$apellido,$email,$pw_hashed,$pais,$fecha));
			$_SESSION["usuario"] = TRUE; // Un usuario nunca se podra volver asi mismo admin
			$_SESSION["id"] = $id;
			$_SESSION["nombre"] = $nombre;
			$_SESSION["apellido"] = $apellido;
			$_SESSION["correo"] = $email;
			$_SESSION["pais"] = $pais;
			$_SESSION["fecha_registro"] = $fecha;
			header('Location:/index.html');
		}
		
	} else {
		include '../include/header.html';
			echo '<div class="container-fluid mt-3">
					<div class="row justify-content-md-center">
						<div class="col-4">
							<div class="alert alert-danger" role="alert">
								<h4 class="alert-heading">Error al registrar cuenta</h4>
								<p> Las contraseñas ingresadas no son iguales </p>
								<hr>
								<p class="mb-0"> Será redireccionado en 5 segundos </p>
							</div>
						</div>
					</div>
				</div>';
			header( "refresh:5; url=/sesion/sign-up.html" ); 
	}
	pg_close();
}
?>