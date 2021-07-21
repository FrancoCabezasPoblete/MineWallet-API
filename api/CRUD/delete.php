<?php
/* Este archivo debe manejar la lógica de borrar un usuario (y los registros relacionados) como admin */
if ($_SERVER["REQUEST_METHOD"]=="GET"){
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
	$id = $_GET["id"];
	/* Eliminar filas, primero donde el id es FK y posteriormente donde es Primary Key */
	pg_query_params($dbconn, 'DELETE FROM cuenta_bancaria WHERE id_usuario = $1',array($id));
	pg_query_params($dbconn, 'DELETE FROM usuario_tiene_moneda WHERE id_usuario = $1',array($id));
	pg_query_params($dbconn, 'DELETE FROM usuario WHERE id = $1',array($id));
	header("Location: ../all.html");
	pg_close();
}
?>