<?php
/* Este archivo debe usarse para comprobar si existe una sesión válida 
   Considerar qué pasa cuando la sesión es válida/inválida para cada página:
   - Página principal
   - Mi perfil
   - Mi billetera
   - Administración de usuarios y todo el CRUD
   - Iniciar Sesión
   - Registrarse
*/
if(session_status() !== 2) session_start();
$page = basename($_SERVER['PHP_SELF']);
$dir = dirname($_SERVER['PHP_SELF']); 
//Verificar que sesion esta activa
if(isset($_SESSION["usuario"])){
   if($page == "log-in.html" || $page == "sign-up.html" || $dir == "/admin/users" || $dir == "/admin/users/CRUD"){
      header('Location: /index.html');
   }
} elseif(isset($_SESSION["admin"])){
   if($page == "log-in.html" || $page == "sign-up.html" || $page == "wallet.html"){
      header('Location: /index.html');
   }
} else {
   if(!($page == "log-in.html" || $page == "sign-up.html" || $page == "index.html")){
      header('Location: /index.html');
   }
}

?>
