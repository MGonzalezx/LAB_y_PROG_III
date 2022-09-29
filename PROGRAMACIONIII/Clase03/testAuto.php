<?php

include_once "Ejercicio19.php";

$autos = [];

//Crear dos objetos “Auto” de la misma marca y distinto color.
$AutoUno = new Auto("Volvo","Rojo");
$AutoDos = new Auto("Volvo","Verde");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$AutoTres = new Auto("Ferrari","Rojo",125.50);
$AutoCuatro = new Auto("Ferrari","Rojo",125.50);

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$AutoCinco = new Auto("Citroen","Rojo",500, date("r"));

array_push($autos, $AutoUno);
array_push($autos, $AutoDos);
array_push($autos, $AutoTres);
array_push($autos, $AutoCuatro);
array_push($autos, $AutoCinco);

//Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
//al atributo precio.



 echo $AutoTres->MostrarAuto($AutoTres);
 echo $AutoCuatro->MostrarAuto($AutoCuatro);
 echo $AutoCinco->MostrarAuto($AutoCinco);
 echo "Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.<br><br>";
 $AutoTres->AgregarImpuestos(1500);
 $AutoCuatro->AgregarImpuestos(1500);
 $AutoCinco->AgregarImpuestos(1500);

 echo $AutoTres->MostrarAuto($AutoTres);
 echo $AutoCuatro->MostrarAuto($AutoCuatro);
 echo $AutoCinco->MostrarAuto($AutoCinco);

 echo "<br><br>";

 //Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
 //resultado obtenido.
 echo "Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.<br><br>";
 $suma = 0;
 $suma = $AutoUno->Add($AutoUno,$AutoDos);

 echo "La suma es: ". $suma . "<br><br>";

 //Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
 echo "Auto uno y auto dos<br>";
 $AutoUno->Add($AutoUno,$AutoDos);
 echo "<br>";
 echo "Auto uno y auto cinco<br>";
 $AutoUno->Add($AutoUno,$AutoCinco);
 echo "<br>";
 //Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,5)
 echo $AutoUno->MostrarAuto($AutoUno);
 echo $AutoTres->MostrarAuto($AutoTres);
 echo $AutoCinco->MostrarAuto($AutoCinco);

/*Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
archivo autos.csv.*/ 

foreach($autos as $item)
    {
        $AutoUno->alta($item);
    }
   
    /*Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv*/

echo "<br>";
echo "<br>";
$AutoUno->leer();

?>