<?php
include '../../cURL.php';
if(isset($_GET['method']) && isset($_GET['url']) && isset($_GET['id'])){
    //echo 'http://localhost:5000/api/'.$_GET['url'] .'/'.$_GET['id'];
    if($_GET['method'] == 'delete' && !($_GET['url'] == "usuario_tiene_moneda" || $_GET['url'] == "precio_moneda")){
        CallAPI('DELETE', 'http://localhost:5000/api/'.$_GET['url'].'/'.$_GET['id'], false);
        header("Location: /api/all.html?url=".$_GET['url']);
    } else if($_GET['method'] == 'delete' && $_GET['url'] == "usuario_tiene_moneda" && isset($_GET['id_2'])){
        //echo 'http://localhost:5000/api/'.$_GET['url'] .'/'.$_GET['id'].'/'.$_GET['id_2'];
        
        CallAPI('DELETE', 'http://localhost:5000/api/'.$_GET['url'] .'/'.$_GET['id'].'/'.$_GET['id_2'], false);
        header("Location: /api/all.html?url=".$_GET['url']);
    } else if($_GET['method'] == 'delete' && $_GET['url'] == "precio_moneda" && isset($_GET['id_2'])){
        //echo 'http://localhost:5000/api/'.$_GET['url'] .'/'.$_GET['id'].'/'.$_GET['id_2'];
        $data = array(
            "fecha" => $_GET["id_2"]
        );

        CallAPI('DELETE', 'http://localhost:5000/api/'.$_GET['url'] .'/'.$_GET['id'], json_encode($data));
        header("Location: /api/all.html?url=".$_GET['url']);
    }else {
        header("Location: /user/simulacro.html");
    }
} else if(!(isset($_GET['method'])) && isset($_GET['url'])) {
        header("Location: /api/all.html?url=".$_GET['url']);
} else {
    header("Location: /user/simulacro.html");
}

?>