<?php
/*
MARTIN GONZALEZ
Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no. */

include "usuario.php";

class Registro{

   public static function registro(){

        $miUsuario = new Usuario($_POST['id'],$_POST['nombre'], $_POST['apellido'] ,$_POST['clave'],$_POST['email'],$_POST['localidad'], date("r"));
        $miUsuario->AltaPDO();
    
    }
}









?>


