<?php
if(isset($_GET['url'])){
        $get_data = CallAPI('GET', 'http://localhost:5000/api/'.$_GET['url'], false);
        $response = json_decode($get_data, true);
        switch($_GET['url']){
                case "usuario":
                        $data = $response["usuarios"];
                        echo    '<th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Cod País</th>
                                <th scope="col">Fecha registro</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["id"].'</td>
                                        <td for="name">'.$row["nombre"].'</td>
                                        <td for="last name">'.$row["apellido"].'</td>
                                        <td for="mail">'.$row["correo"].'</td>
                                        <td for="country">'.$row['pais'].'</td>
                                        <td for="date">'.$row['fecha'].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row['id'].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';      
                        }
                        break;
                case "pais":
                        $data = $response["paises"];
                        echo    '<th scope="col">Cod País</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["cod_pais"].'</td>
                                        <td for="name">'.$row["nombre"].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["cod_pais"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row['cod_pais'].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "cuenta_bancaria":
                        $data = $response["cuentas_bancarias"];
                        echo    '<th scope="col">Numero de Cuenta</th>
                                <th scope="col">Id usuario</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["numero_cuenta"].'</td>
                                        <td for="name">'.$row["id_usuario"].'</td>
                                        <td for="name">'.$row["balance"].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["numero_cuenta"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row['numero_cuenta'].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                                
                        }
                        break;
                case "usuario_tiene_moneda":
                        $data = $response["usuarios_tiene_monedas"];
                        echo    '<th scope="col">ID Usuario</th>
                                <th scope="col">ID Moneda</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["id_usuario"].'</td>
                                        <td for="name">'.$row["id_moneda"].'</td>
                                        <td for="mail">'.$row["balance"].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["id_usuario"].'&id_2='.$row["id_moneda"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row["id_usuario"].'&id_2='.$row["id_moneda"].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "moneda":
                        $data = $response["monedas"];
                        echo    '<th scope="col">ID</th>
                                <th scope="col">Sigla</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["id"].'</td>
                                        <td for="last name">'.$row["sigla"].'</td>
                                        <td for="name">'.$row["nombre"].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row['id'].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "precio_moneda":
                        $data = $response["precio_monedas"];
                        echo    '<th scope="col">ID Moneda</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr></tr>
                                        <td for="id">'.$row["id_moneda"].'</td>
                                        <td for="name">'.$row["valor"].'</td>
                                        <td for="name">'.$row["fecha"].'</td>
                                        <td>
                                        <a href="/api/update.html?url='.$_GET['url'].'&id='.$row["id_moneda"].'&id_2='.$row['fecha'].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?url='.$_GET['url'].'&id='.$row['id_moneda'].'&id_2='.$row['fecha'].'&method=delete" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                default:
                        header("Location: /user/simulacro.html");
        }
} else {
        header("Location: /user/simulacro.html");
}

?>
