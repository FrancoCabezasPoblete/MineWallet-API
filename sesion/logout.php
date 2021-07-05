<?php
/* Este archivo debe manejar la lógica de cerrar una sesión */
if(session_status() !== 2) session_start(); // Revisa si existe una sesión activa, si no existe la activa
session_unset(); // Elimina los datos de la sesión actual
session_destroy(); // Termina la sesión actual
header('Location:/index.html');
exit();
?>