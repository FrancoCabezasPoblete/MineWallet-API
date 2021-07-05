<?php 
/* Este archivo debe manejar la lógica de iniciar sesión */
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
	$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$pass = $_POST["password"];
	if(isset($email) && isset($pass)){
		$sql = pg_query($dbconn,"SELECT * FROM usuario WHERE correo = '".$email."';");
		include '../include/header.html';
		if(pg_num_rows($sql) < 1) { 
			echo '<div class="container mt-5">
					<div class="row justify-content-md-center">
						<div class="col">
							<div class="alert p-4" style="background-color:#F4F7FA; border-color:white;"role="alert">
								<h4 class="alert-heading">Error al iniciar sesión</h4>
								<p> Inicio de sesión erróneo, no existe usuario con correo '.$email.' </p>
								<hr>
								<div class="row">
									<div class="col-auto">
										<div class="spinner-border spinner-border-sm p-0 m-0" role="status" style="color:#FD7CA6;">
											<span class="sr-only">Loading...</span>
										</div>
									</div>
									<div class="col-auto pl-0">
										<p class="mb-0"> Será redireccionado en 5 segundos...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
			header("refresh:5; url=log-in.html");
		} elseif(pg_num_rows($sql) > 1) {
			echo '<div class="container mt-5">
					<div class="row justify-content-md-center">
						<div class="col">
							<div class="alert p-4" style="background-color:#F4F7FA; border-color:white;"role="alert">
								<h4 class="alert-heading">Error al iniciar sesión</h4>
								<p> Inicio de sesión erroneo, existe más de un usuario con correo '.$email.' </p>
								<hr>
								<div class="row">
									<div class="col-auto">
										<div class="spinner-border spinner-border-sm p-0 m-0" role="status" style="color:#FFB635;">
											<span class="sr-only">Loading...</span>
										</div>
									</div>
									<div class="col-auto pl-0">
										<p class="mb-0"> Será redireccionado en 5 segundos...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
				header("refresh:5; url=log-in.html");
		} else {
			$arr = pg_fetch_array($sql); // Se le asiga los valores de la consulta sql a un array
			if(password_verify($pass, $arr["contraseña"])){
				session_start();
				if($arr["admin"] == 't'){ // TRUE: es admin
					$_SESSION["admin"] = TRUE;
				} else { // FALSE: es usuario
					$_SESSION["usuario"] = TRUE;
				}
				$_SESSION["id"] = $arr["id"];
				$_SESSION["nombre"] = $arr["nombre"];
				$_SESSION["apellido"] = $arr["apellido"];
				$_SESSION["correo"] = $arr["correo"];
				$_SESSION["pais"] = $arr["pais"];
				$_SESSION["fecha_registro"] = $arr["fecha_registro"];
				echo '<div class="container mt-5">
				<div class="row justify-content-md-center">
					<div class="col">
						<div class="alert p-4" style="background-color:#F4F7FA; border-color:white;"role="alert">
							<h4 class="alert-heading">¡Inicio de sesión exitoso!</h4>
							<hr>
							<div class="row">
								<div class="col-auto">
									<div class="spinner-border spinner-border-sm p-0 m-0" role="status" style="color:#9478EF;">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
								<div class="col-auto pl-0">
									<p class="mb-0"> Será redireccionado en 3 segundos...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
			header("refresh:3; url=/index.html");
			} else {
				echo '<div class="container mt-5">
				<div class="row justify-content-md-center">
					<div class="col">
						<div class="alert p-4" style="background-color:#F4F7FA; border-color:white;"role="alert">
							<h4 class="alert-heading">Error al iniciar sesión</h4>
							<p> Contraseña incorrecta, inténtelo nuevamente </p>
							<hr>
							<div class="row">
								<div class="col-auto">
									<div class="spinner-border spinner-border-sm p-0 m-0" role="status" style="color:#FD7CA6;">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
								<div class="col-auto pl-0">
									<p class="mb-0"> Será redireccionado en 5 segundos...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
			header("refresh:5; url=log-in.html");
			}
		}
	} 
	pg_close();
}

?>