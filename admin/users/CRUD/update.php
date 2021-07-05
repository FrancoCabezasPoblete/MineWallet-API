<?php
/* Este archivo debe manejar la lógica de actualizar los datos de un usuario como admin */
if(session_status() !== 2) session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    $id = $_GET["id"];
    $nombre = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    if($_SESSION["id"] == $id){
        $_SESSION["nombre"] = $nombre;
        $_SESSION["apellido"] = $apellido;
        $_SESSION["correo"] = $correo;
    }
    $contrasena = $_POST["pwd"];
    $opciones = array('cost'=>12);
    $contrasena_hasheada = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
    $pais = $_POST["country"];
    $actualizar = "UPDATE usuario SET nombre = $1, apellido = $2, correo = $3, contraseña = $4, pais = $5 WHERE id = $id";
    $result = pg_query_params($dbconn, $actualizar, array($nombre, $apellido,$correo, $contrasena_hasheada, $pais));
    header("Location: ../all.html");

}
?>