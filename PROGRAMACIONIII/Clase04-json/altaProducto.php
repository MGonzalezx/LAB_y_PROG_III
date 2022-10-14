<?php

/**Aplicación No 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un
objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe
el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo
renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase */

include "producto.php";
class RegistroProducto
{

    public static function RecibidorDatosProducto($codBarras, $nombre, $tipo, $stock, $precio)
    {


        $miProducto = new Producto(rand(1, 10000), $codBarras, $nombre, $tipo, $stock, $precio);

        
        if ($miProducto->VerificarCodBarras() && !file_exists("./Archivos/producto.json")) {

            $miProducto->GuardarJson();
            echo "Ingresado";

        } else if ($miProducto->VerificarCodBarras() && file_exists("./Archivos/producto.json")) {

            $existe =  $miProducto->VerificarExistencia();

            switch ($existe) {
                case 0:
                    echo "No se pudo hacer";
                    break;
                case 1:
                    echo "Actualizado";
                    break;
                case 2:
                    $miProducto->GuardarJson();
                    echo "Ingresado";
                    break;

                default:
                    # code...
                    break;
            }
        } else {
            echo "Formato de código de barra incorrecto";
        }

        return $miProducto;
    }
}
