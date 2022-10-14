<?php
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        switch (isset($_POST)) {
            case 'registro':
                require_once "registro.php";
                require_once "usuario.php";
                Registro::RecibidorDatos($_POST['nombre'],$_POST['clave'],$_POST['email']);
                break;
                case 'logros':
                    echo "hola";
                    break;

            default:
                echo "Peticion POST no valida";
                
        }
        break;
    case 'GET':
        switch (isset($_GET)) {
            case 'listado':
                require_once "listado.php";
                require_once "usuario.php";
                Listado::MostrarListado("usuarios.csv");
                break;

            default:
                echo "Peticion GET no valida";
                break;
        }
        break;
    default:
        echo "Petición invalida";
}
