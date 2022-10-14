<?php
/*Martin Gonzalez
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.

*/
include "usuario.php";
class Registro
{

    public static function RecibidorDatos($nombre,$clave,$email)
    {
        
        $miUsuario = new Usuario(rand(1,10000),$nombre,  $clave, $email, date("c"),"");

        //Usuario::Alta($miUsuario);
        //$miUsuario->GuardarJson();

        return $miUsuario;
    }
}
