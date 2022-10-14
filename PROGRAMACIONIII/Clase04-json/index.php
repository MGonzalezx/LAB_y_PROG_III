<?php
/*Martin Gonzalez
EJERCICIOS 23 A 26
*/

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        switch (key($_POST)) {
            case 'registro':
                //require_once "AgregarUsuario_Imagen.php";
                require_once "registro.php";

                if (isset($_FILES['archivo'])) {
                    $esImagen = getimagesize($_FILES['archivo']["tmp_name"]); //confirma si es imagen
                    if ($esImagen !== FALSE) {


                        $usuario = Registro::RecibidorDatos($_POST['nombre'], $_POST['clave'], $_POST['email']);
                        //$usuario = new Usuario(rand(1,10000),$_POST['nombre'],  $_POST['clave'], $_POST['email'], date("r"));


                        $destino = "./Usuario/Fotos/" . $usuario->GetNombre() . "." . date("His") . ".jpg";
                        if (move_uploaded_file($_FILES['archivo']["tmp_name"], $destino)) {
                            // $usuario->GetPathFoto() = $destino;
                            $usuario->SetPathFoto($destino);
                            $usuario->GuardarJson();
                            echo "Usuario e imagen agregados con exito";
                        }
                    } else {
                        echo "No es imagen";
                    }
                } else {
                    echo "No hay imagen";
                }



                break;
            case 'altaProducto':
                require_once "altaProducto.php";
                RegistroProducto::RecibidorDatosProducto($_POST['codBarra'], $_POST['nombre'], $_POST['tipo'], $_POST['stock'], $_POST['precio']);
                break;
            case 'realizarVenta':
                require_once "RealizarVenta.php";
                MiVenta::RecibidorDatosVenta($_POST['codBarraProducto'], $_POST['idUsuario'], $_POST['stockAComprar']);
                break;

            default:
                echo "Peticion POST no valida";
                var_dump(key($_POST));
        }
        break;
    case 'GET':
        switch (isset($_GET)) {
            case 'listado':
                require_once "listado.php";
                require_once "usuario.php";
                Listado::MostrarListado("./Archivos/usuarios.json");
                break;

            default:
                echo "Peticion GET no valida";
                break;
        }
        break;
    default:
        echo "Petición invalida";
}
