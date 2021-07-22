<?php
include '../../cURL.php';
if(isset($_GET['url'])){
    switch($_GET['url']){
        case "usuario":
            $data = array(
                'nombre' => filter_var($_POST['nombre'], FILTER_SANITIZE_STRING),
                'apellido' => filter_var($_POST['apellido'], FILTER_SANITIZE_STRING),
                'correo' => filter_var($_POST['correo'], FILTER_SANITIZE_STRING),
                'contraseña' => filter_var($_POST['contraseña'], FILTER_SANITIZE_STRING),
                'pais' => filter_var($_POST['pais'], FILTER_SANITIZE_STRING)
            );
            CallAPI('POST', 'http://localhost:5000/api/usuario/', json_encode($data));
            break;

        case "usuario_tiene_moneda":
            $data = array(
                'id_usuario' => filter_var($_POST['id_usuario'], FILTER_SANITIZE_STRING),
                'id_moneda' => filter_var($_POST['id_moneda'], FILTER_SANITIZE_STRING),
                'balance' => filter_var($_POST['balance'], FILTER_SANITIZE_STRING)
            );

            CallAPI('POST', 'http://localhost:5000/api/usuario_tiene_moneda/', json_encode($data));
            break;
            
        case "precio_moneda":
            $data = array(
                "valor" => filter_var($_POST["valor"], FILTER_SANITIZE_STRING),
                "id_moneda" => filter_var($_POST["id_moneda"], FILTER_SANITIZE_STRING)
            );

            CallAPI('POST', 'http://localhost:5000/api/precio_moneda/', json_encode($data));
            break;
            
        case "pais":
            $data = array(
                'nombre' => filter_var($_POST['nombre'], FILTER_SANITIZE_STRING)
            );
            CallAPI('POST', 'http://localhost:5000/api/pais/', json_encode($data));
            break;

        case "moneda":
            $data = array(
                "sigla" => filter_var($_POST["sigla"], FILTER_SANITIZE_STRING),
                "nombre" => filter_var($_POST["nombre"], FILTER_SANITIZE_STRING)
            );

            CallAPI('POST', 'http://localhost:5000/api/moneda/', json_encode($data));
            break;
        case "cuenta_bancaria":
            $data = array(
                "id_usuario" => filter_var($_POST["id_usuario"], FILTER_SANITIZE_STRING),
                "balance" => filter_var($_POST["balance"], FILTER_SANITIZE_STRING)
            );

            CallAPI('POST', 'http://localhost:5000/api/cuenta_bancaria/', json_encode($data));
            break;
    }
}
header('Location: ../all.html?url='.$_GET['url']);

?>
