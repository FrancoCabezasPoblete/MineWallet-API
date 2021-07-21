<?php
/* Formularios para cada tabla */
echo    '<div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" class="form-control" placeholder="Apellido" id="surname" name="surname">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" placeholder="correo@electronico.com" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña</label>
            <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="pwd" required>
        </div>'
?>