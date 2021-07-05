<?php
/* Este archivo debe manejar la lógica para obtener la información del perfil */
echo   '<p>Nombre Completo: '.$_SESSION["nombre"].' '.$_SESSION["apellido"].' </p>
		<p>Correo: '.$_SESSION["correo"].' </p>';
switch($_SESSION["pais"]){
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

echo   '<p>Fecha de Ingreso: '.$_SESSION["fecha_registro"].'</p>';

if(isset($_SESSION["admin"])){
	echo '<p>Modo: Administrador </p>';
} else {
	echo '<p>Modo: Usuario </p>';
}
?>