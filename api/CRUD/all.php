<?php
if(isset($_GET['url'])){
        switch($_GET['url']){
                case "usuario":
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
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';      
                        }
                        break;
                case "pais":
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
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "cuenta_bancaria":
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
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                                
                        }
                        break;
                case "usuario_tiene_moneda":
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
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "moneda":
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
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
                case "precio_moneda":
                        echo    '<th scope="col">ID Moneda</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>';
                        foreach($data as $row) {
                                echo   '<tr>
                                        <td for="id">'.$row["id_moneda"].'</td>
                                        <td for="name">'.$row["valor"].'</td>
                                        <td for="name">'.$row["fecha"].'</td>
                                        <td><a href="/admin/users/read.html?id='.$row["id"].'" class="btn btn-1">Ver <i class="fas fa-search"></i></a>
                                        <a href="/api/update.html?id='.$row["id"].'" class="btn btn-2">Editar <i class="fas fa-edit"></i></a>
                                        <a href="/api/CRUD/delete.php?id='.$row["id"].'" class="btn btn-3">Borrar <i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        </tr>';
                                        
                        }
                        break;
        }
}

?>
