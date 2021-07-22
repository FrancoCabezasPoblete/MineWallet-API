<?php
if(isset($_GET['url'])){
    /* Formularios para cada tabla */
    switch($_GET['url']){
        case "usuario":
            echo '<div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" placeholder="correo@electronico.com" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="contraseña">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contraseña" id="contraseña" name="contraseña" required>
                </div>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" placeholder="Codigo País" id="pais" name="pais" required>
                </div>';
            break;

        case "pais":
            echo '<div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre país" id="nombre" name="nombre" required>
                </div>';
            break;
                
        case "cuenta_bancaria":
            echo '<div class="form-group">
                    <label for="id_usuario">ID Usuario</label>
                    <input type="text" class="form-control" placeholder="ID Usuario" id="id_usuario" name="id_usuario" required>
                </div>
                <div class="form-group">
                    <label for="balance">Balance</label>
                    <input type="text" class="form-control" placeholder="Balance" id="balance" name="balance" required>
                </div>';
            break;

        case "usuario_tiene_moneda":
            echo '<div class="form-group">
                    <label for="id_usuario">ID Usuario</label>
                    <input type="text" class="form-control" placeholder="ID Usuario" id="id_usuario" name="id_usuario" required>
                </div>
                <div class="form-group">
                    <label for="id_moneda">ID Moneda</label>
                    <input type="text" class="form-control" placeholder="ID Moneda" id="id_moneda" name="id_moneda" required>
                </div>
                <div class="form-group">
                    <label for="balance">Balance</label>
                    <input type="text" class="form-control" placeholder="Balance" id="balance" name="balance" required>
                </div>';
            break;

        case "moneda":
            echo '<div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" class="form-control" placeholder="Sigla" id="sigla" name="sigla" required>
                </div>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre moneda" id="nombre" name="nombre" required>
                </div>';
            break;
            
        case "precio_moneda":
            echo '<div class="form-group">
                    <label for="id_moneda">ID Moneda</label>
                    <input type="text" class="form-control" placeholder="ID Moneda" id="id_moneda" name="id_moneda" required>
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" placeholder="Valor" id="valor" name="valor" required>
                </div>';
            break;

        default:
            header("Location: /user/simulacro.html");
    }
}   
?>