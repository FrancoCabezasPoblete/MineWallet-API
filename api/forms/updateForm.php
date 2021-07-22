<?php 
if(isset($_GET['url']) && isset($_GET['id'])){
    switch($_GET['url']){
        case 'usuario':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'" method="POST">
                    <div class="form-group">
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
                    <input type="text" class="form-control" placeholder="País" id="pais" name="pais">
                </div>';
            break;

        case 'pais':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre Pais" id="nombre" name="nombre">
                </div>';
            break;

        case 'cuenta_bancaria':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'" method="POST">
                <div class="form-group">
                <label for="id_usuario">ID Usuario</label>
                <input type="text" class="form-control" placeholder="ID Usuario" id="id_usuario" name="id_usuario" required>
            </div>
            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="text" class="form-control" placeholder="Balance" id="balance" name="balance">
            </div>';

            break;

        case 'usuario_tiene_moneda':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'&id_2='.$_GET["id_2"].'" method="POST">
                <div class="form-group">
                <label for="balance">Balance</label>
                <input type="text" class="form-control" placeholder="Balance" id="balance" name="balance" required>
            </div>';
            
            break;

        case 'moneda':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'" method="POST">
                <div class="form-group">
                <label for="sigla">Sigla</label>
                <input type="text" class="form-control" placeholder="Sigla" id="sigla" name="sigla" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre moneda" id="nombre" name="nombre" required>
            </div>';

            break;

        case 'precio_moneda':
            echo '<form action="/api/CRUD/update.php?url='.$_GET['url'].'&id='.$_GET["id"].'&id_2='.$_GET["id_2"].'" method="POST">
                <div class="form-group">
                <label for="name">Valor</label>
                <input type="text" class="form-control" placeholder="Valor" id="valor" name="valor" required>
            </div>';

            break;


    }
}
?>