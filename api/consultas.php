<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_GET['url'] == '6') {
    if(isset($_POST['input']) || $_GET['url'] == '6'){
        if($_GET['url'] != '6'){
            $get_data = CallAPI('GET', 'http://localhost:5000/api/consultas/'.$_GET['url'].'/'.$_POST['input'], false);
            $response = json_decode($get_data, true); 
            switch($_GET['url']){
                case "1":
                    $data = $response["usuarios"];
                    echo 'Los usuarios registrados durante el año '.$_POST['input'].' son: ';
                    if(isset($data[0])){
                    echo    '<table class="table table-bordered" style="background-color: white;">
                            <tbody>';
                    foreach($data as $row){
                        echo   '<tr>
                                    <td for="id">'.$row["nombre"].'</td>
                                    <td for="id">'.$row["apellido"].'</td>
                                    <td for="id">'.$row["correo"].'</td>
                                </tr>';
                    }  
                    echo    '</tbody>
                            </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
                case "2":
                    $data = $response["cuentas bancarias"];
                    echo 'El número de cuenta de las cuentas bancarias con el balance superior a '.$_POST['input'].' son: '; 
                    if(isset($data[0])){ 
                    echo    '<table class="table table-bordered" style="background-color: white;">
                            <tbody>';
                    foreach($data as $row){
                        echo   '<tr>
                                    <td for="id">'.$row["numero_cuenta"].'</td>
                                </tr>';
                    }  
                    echo    '</tbody>
                            </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }                  
                    break;
                case "3":
                    $data = $response["usuarios"]; 
                    echo 'Los usuarios que pertenecen a '.$_POST['input'].' son: ';
                    if(isset($data[0])){
                    echo    '<table class="table table-bordered" style="background-color: white;">
                            <tbody>';
                    foreach($data as $row){
                        echo   '<tr>
                                    <td for="id">'.$row["nombre"].'</td>
                                    <td for="id">'.$row["apellido"].'</td>
                                    <td for="id">'.$row["correo"].'</td>
                                </tr>';
                    }  
                    echo    '</tbody>
                            </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
                case "4":
                    $data = $response["maximo historico"];
                    echo 'El valor máximo historico de la moneda con ID'.$_POST['input'].' es: ';
                    if(isset($data[0])){
                    echo    '<table class="table table-bordered" style="background-color: white;">
                            <tbody>';
                    foreach($data as $row){
                        echo   '<tr>
                                    <td for="id">'.$row["valor"].'</td>
                                </tr>';
                    }  
                    echo    '</tbody>
                            </table>';
                            
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
                case "5":
                    $data = $response["cantidad en circulacion"];
                    echo 'La cantidad de la moneda '.$_POST['input'].' en circulación es: ';
                    if(isset($data[0]["sum"])){
                        echo    '<table class="table table-bordered" style="background-color: white;">
                                <tbody>';
                        foreach($data as $row){
                            echo   '<tr>
                                        <td for="id">'.$row["sum"].'</td>
                                    </tr>';
                        }  
                        echo    '</tbody>
                                </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
                case "7":
                    $data = $response["cantidad en circulacion"];
                    echo 'La moneda que mas a cambiado durante el mes con el ID '.$_POST['input'].' es: ';
                    if(isset($data[0])){
                        echo    '<table class="table table-bordered" style="background-color: white;">
                                <tbody>';
                        foreach($data as $row){
                            echo   '<tr>
                                        <td for="id">'.$row["id_moneda"].'</td>
                                    </tr>';
                        }  
                        echo    '</tbody>
                                </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
                case "8":
                    $data = $response["top moneda"];
                    echo 'El ID de la criptomoneda mas abundante del usuario '.$_POST['input'].' es: ';
                    if(isset($data[0])){
                        echo    '<table class="table table-bordered" style="background-color: white;">
                                <tbody>';
                        foreach($data as $row){
                            echo   '<tr>
                                        <td for="id">'.$row["id_moneda"].'</td>

                                    </tr>';
                        }  
                        echo    '</tbody>
                                </table>';
                    } else {
                        echo '<p></br>No existen registros cumplan con la condición</p>';
                    }
                    break;
            }
            
        } else {
            $get_data = CallAPI('GET', 'http://localhost:5000/api/consultas/6', false);
            $response = json_decode($get_data, true);
            $data = $response["top monedas"];        
            echo 'El ID de las tres monedas mas utilizadas son: ';
            if(isset($data[0])){
            echo    '<table class="table table-bordered" style="background-color: white;">
                            <tbody>';
            foreach($data as $row){
                echo   '<tr>
                            <td for="id">'.$row["id_moneda"].'</td>
                        </tr>';
            }  
            echo    '</tbody>
                    </table>';
            } else {
                echo '<p></br>No existen registros cumplan con la condición</p>';
            }
        }
    }
}
?>