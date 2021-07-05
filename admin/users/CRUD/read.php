<?php
/* Este archivo debe manejar la lógica de obtener los datos de un determinado usuario */
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
	$id = $_GET["id"];
	$sql = pg_query($dbconn, 'SELECT id, nombre, apellido, correo, pais, fecha_registro FROM usuario WHERE id = '.$id);
	$row = pg_fetch_assoc($sql);
	echo   '<p>ID: '.$row["id"].'</p>
			<p>Nombre: '.$row["nombre"].' </p>
			<p>Apellido: '.$row["apellido"].' </p>
			<p>Correo: '.$row["correo"].' </p>';
	switch($row["pais"]){
		case 1:
			echo '<p>País: Angola </p>';
			break;
		case 2:
			echo '<p>País: Sudáfrica </p>';
			break;
		case 3:
			echo '<p>País: Canadá </p>';
			break;
		case 4:
			echo '<p>País: Estados Unidos </p>';
			break;
		case 5:
			echo '<p>País: Chile </p>';
			break;
		case 6:
			echo '<p>País: Australia  </p>';
			break;
		case 7:
			echo '<p>País: India </p>';
			break;
		case 8:
			echo '<p>País: Corea del Sur </p>';
			break;
		case 9:
			echo '<p>País: Rusia </p>';
			break;
		default:
			echo '<p>País: Suiza </p>';
			break;
	}
	echo   '<p>Fecha de Ingreso: '.$row["fecha_registro"].' </p>
			<div class="d-flex justify-content-end">
				<a href="/admin/users/all.html" class="btn btn-4">Volver</a>
				<!-- Estos links deberían tener el ID asociado -->
				<a href="/admin/users/update.html?id='.$id.'" class="btn btn-2 mx-3">Editar <i class="fas fa-edit"></i></a>
				<a href="/admin/users/CRUD/delete.php?id='.$id.'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a></td>
			</div>';
	pg_close();
}
?>