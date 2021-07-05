<?php
/* Este archivo debe manejar la lógica para crear un usuario como admin */
if ($_SERVER["REQUEST_METHOD"]=="POST"){ 
    include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
    $id = pg_num_rows(pg_query("SELECT id FROM usuario"))+1;
    $nombre = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $contraseña = $_POST["pwd"];
    $pais = $_POST["country"];
    $admin = $_POST["admin"];
    $fecha = date("Y-m-d H:i:s",strtotime("-4 hour")); // Se asigna la hora chilena
    $opciones = array('cost'=>12);
    $contrasena_hasheada = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
    
    $base = "SELECT * FROM usuario WHERE correo = $1";
    $verificacion_de_correo = pg_query_params($dbconn, $base, array($correo));
    $verificacion = pg_num_rows($verificacion_de_correo);

    if($verificacion == 0){
        $base = "INSERT INTO usuario(id,nombre,apellido,correo,contraseña,pais,fecha_registro,admin) VALUES ($1,$2,$3,$4,$5,$6,$7,$8)";
        pg_query_params($dbconn,$base,array($id,$nombre,$apellido,$correo,$contrasena_hasheada,$pais,$fecha,$admin));
        header("Location: ../all.html");
    }
    pg_close();
}
?>