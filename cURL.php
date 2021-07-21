<?php

function CallAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    # ------------------------------------------- #

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    # ------------------------------------------- #

    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}

if(isset($_GET['url'])){
    $get_data = CallAPI('GET', 'http://localhost:5000/api/'.$_GET['url'], false);
    $response = json_decode($get_data, true);
    switch($_GET['url']){
        case "usuario":
            $data = $response["usuarios"];
            break;
        case "pais":
            $data = $response["paises"];
            break;
        case "cuenta_bancaria":
            $data = $response["cuentas_bancarias"];
            break;
        case "usuario_tiene_moneda":
            $data = $response["usuarios_tiene_monedas"];
            break;
        case "moneda":
            $data = $response["monedas"];
            break;
        case "precio_moneda":
            $data = $response["precio_monedas"];
            break;
    }
}

?>