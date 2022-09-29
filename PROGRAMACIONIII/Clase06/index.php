<?php
switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        switch (key($_POST)) {
            case "registro":
                require_once "registro.php";
                require_once "usuario.php";
                Registro::registro();
                break;
            
            default:
                echo "Peticion POST no valida";
                break;
        }
        break;
    case "GET":
        switch ($key($_GET)) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        break;
    default:
    echo "Petición invalida";
}

?>

