<?php
// Ejercicio 17 Martin Gonzalez
/*Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
En testAuto.php:


● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)*/ 


 class Auto
{

// Atributos (private - protected – public/var - static)
private string $_color;
private float $_precio;
private string $_marca;
private  $_fecha;

//Constructor
public function __construct(string $marca, string $color, float $precio = 200.00, $fecha = "") 
{
      $this->_marca = $marca;
      $this->_color = $color;
      $this->_precio = $precio;
      $this->_fecha = $fecha;
      
}
// Métodos (private - protected – public/var - static)
public function AgregarImpuestos($cantidad)
{ 
    $this->_precio += $cantidad;
}

public function MostrarAuto(Auto $miAuto)
{ 
    echo "Marca: ". $miAuto->_marca ." Color: ". $miAuto->_color . " Precio: ". $miAuto->_precio. " Fecha: ". $miAuto->_fecha . "<br>";
}

public function Equals(Auto $miAuto)
{
    $retorno = FALSE;
 //get_class
    
    if( $this->_marca== $miAuto->_marca)
    {
        $retorno = TRUE;
    }
    return $retorno;
}



public static function Add(Auto $miAuto, Auto $miOtroAuto)
{
    $retorno = 0;
    if($miAuto->_marca == $miOtroAuto->_marca and $miAuto->_color == $miOtroAuto->_color)
    {
        $retorno = $miAuto->_precio + $miOtroAuto->_precio;
        echo "Los dos autos tienen la misma marca y color <br>";
        return $retorno;
    }else{
        echo "Los dos autos no son de la misma marca y color <br>";
        return $retorno;
    }
}

}

?>