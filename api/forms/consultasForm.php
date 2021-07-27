<?php
if(isset($_GET['url'])){
    switch($_GET['url']){
        case '1': 
            echo    '<p>Obtener todos los usuarios registrados durante el año X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white" >Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="Año" id="input" name="input" required>
                        </div>
                    </form>
                    ';
            
            break;
        case '2': 
            echo    '<p>Obtener todas las cuentas bancarias con un balance superior a X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="Balance Máximo" id="input" name="input" required>
                        </div>
                    </form>
                    ';
            break;
        case '3': 
            echo    '<p>Obtener todos los usuarios que pertenecen al país X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="Cod País" id="input" name="input" required">
                        </div>
                    </form>
                    ';
            break;
        case '4': 
            echo    '<p>Obtener al máximo valor histórico de la moneda X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="ID Moneda" id="input" name="input" required">
                        </div>
                    </form> 
                    ';
            break;
        case '5': 
            echo    '<p>Obtener la cantidad de moneda X en circulación (es decir, la suma de todas las cantidades de la moneda X que poseen todos los usuarios).</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="ID Moneda" id="input" name="input" required">
                        </div>
                    </form>
                    ';
            break;
        case '6': 
            echo    '<p>Obtener el TOP 3 de monedas más populares, es decir, las que son poseídas por la mayor cantidad de usuarios diferentes.</p>';
            break;
        case '7': 
            echo    '<p>Obtener la moneda que más cambió su valor durante el mes X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="Mes" id="input" name="input" required">
                        </div>
                    </form>
                    ';
            break;
        case '8': 
            echo    '<p>Obtener la criptomoneda más abundante del usuario X.</p>
                    <form method="POST" action="'.$_SERVER['PHP_SELF'].'?url='.$_GET['url'].'">
                        <div class="input-group mb-3" style="background-color: white">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon1" style="background-color: #9478EF; color: white">Send</button>
                            </div>
                            <input type="text" class="form-control" placeholder="ID Usuario" id="input" name="input" required">
                        </div>
                    </form>
                    ';
            break;
        default:
            header("Location: /user/simulacro.html");
    }
}

?>