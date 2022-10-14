<?php
/*Martin Gonzalez
Aplicación No 24 ( Listado JSON y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>apellido, nombre,foto</li>
<li>apellido, nombre,foto</li>
</ul>
Hacer los métodos necesarios en la clase usuario*/

include "usuario.php";
class Listado
{

    public static function MostrarListado($archivo){
        $arrayUsuarios = Usuario::LeerJson($archivo);
        //$stringImg = "<img width='100px' height='200px' src='";
        $stringImg = "<img width='25%' src='";
        $nombreFoto = "";
        $stringUnido = "";
        $stringtamani = "";

        foreach ($arrayUsuarios as $value) {
           echo "<ul> <br>";
           echo "<li> ID: ",  $value->GetId(), "</li>";
           echo "<li> Nombre: ",  $value->GetNombre(), "</li>";
           echo "<li> Clave: ",  $value->GetClave(), "</li>";
           echo "<li> Email: ",  $value->GetEmail(), "</li>";
           echo "<li> Fecha de registro: ",  $value->GetFechaRegistro(), "</li>";
           echo "<li style='list-style-type:none'>";
             $nombreFoto = $value->GetPathFoto();
             
            $stringUnido = $stringImg.$nombreFoto."'";
            echo $stringUnido;
            echo "</li>";
           echo "</ul> <br>";
        }
    }

}
