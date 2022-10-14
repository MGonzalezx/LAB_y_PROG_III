<?php

class Agregar{

    public static function RecibidorDatos($_nombre,$_clave,$_email)
    {
        require_once("Usuario.php");
        $objRetorno = new stdClass();
        $objRetorno->Exito = false;
        $objRetorno->Mensaje = "Fallo Post";
        
        
        $nombre = isset($_nombre) ? $_nombre : null;
        $clave = isset($_clave) ? $_clave : null;
        $email = isset($_email) ? $_email : null;
        //$fechaRegistro = isset($_POST["fechaRegistro"]) ? $_POST["fechaRegistro"] : null;
        
        /*$flag = false;
        if(isset($_FILES[$archivo])){
            $esImagen = getimagesize($_FILES[$archivo]["tmp_name"]); //confirma si es imagen
            if($esImagen !== FALSE) {
                $flag = true;
            } else{
                echo "No es imagen";
            }
        } else{
            echo "No hay imagen";
        }*/
        
        if($nombre != null && $clave != null && $email != NULL){
           

              //  $usuario->GuardarJson();
              $objRetorno->Exito = true;
             $objRetorno->Mensaje = "Usuario e imagen agregados con exito";
            
        }
        echo json_encode($objRetorno);
    }
}


/*
$objRetorno = new stdClass();
$objRetorno->Exito = false;
$objRetorno->Mensaje = "Fallo Post";

$id = rand(1,10000);
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
$clave = isset($_POST["clave"]) ? $_POST["clave"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$fechaRegistro = isset($_POST["fechaRegistro"]) ? $_POST["fechaRegistro"] : null;

$flag = false;
if(isset($_FILES["archivo"])){
    $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]); //confirma si es imagen
    if($esImagen !== FALSE) {
        $flag = true;
    } else{
        echo "No es imagen";
    }
} else{
    echo "No hay imagen";
}

if($id != null && $nombre != null && $clave != null && $email != NULL && $fechaRegistro != NULL && $flag){
    $usuario = new Usuario($id, $nombre, $clave, $email, date("r"), "");
     
        $destino = "./Usario/Foto/" .$usuario->GetNombre(). "." . date("His") . ".jpg";
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {
           // $usuario->GetPathFoto() = $destino;
           $usuario->SetPathFoto($destino);
            
        }
    
}
echo json_encode($objRetorno);*/
?>