<?php
/* Este archivo debe manejar la lógica de obtener los datos de todos los usuarios */ 

include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
$sql = pg_query($dbconn, 'SELECT id, nombre, apellido, correo FROM usuario WHERE admin = FALSE');
echo    '<tr>
                <td for="id">'.$_SESSION["id"].'</td>
                <td for="name">'.$_SESSION["nombre"].'</td>
                <td for="last name">'.$_SESSION["apellido"].'</td>
                <td for="mail">'.$_SESSION["correo"].'</td>
                <td><a href="/admin/users/read.html?id='.$_SESSION["id"].'" class="btn btn-1">Ver <i
                        class="fas fa-search"></i></a>
                <a href="/admin/users/update.html?id='.$_SESSION["id"].'" class="btn btn-2">Editar <i
                        class="fas fa-edit"></i></a>
                <a href="/admin/users/CRUD/delete.php?id='.$_SESSION["id"].'" class="btn btn-3">Borrar <i
                        class="fas fa-trash-alt"></i></a>
                </td>
        </tr>';
while($row = pg_fetch_assoc($sql)) {
        echo   '<tr>
                <td for="id">'.$row["id"].'</td>
                <td for="name">'.$row["nombre"].'</td>
                <td for="last name">'.$row["apellido"].'</td>
                <td for="mail">'.$row["correo"].'</td>
                <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i
                            class="fas fa-search"></i></a>
                    <a href="/admin/users/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i
                            class="fas fa-edit"></i></a>
                    <a href="/admin/users/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i
                            class="fas fa-trash-alt"></i></a>
                </td>
            </tr>';
}
pg_close();
?>
