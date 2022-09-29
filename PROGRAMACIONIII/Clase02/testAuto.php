<?php

include_once "Ejercicio17.php";

//Crear dos objetos “Auto” de la misma marca y distinto color.
$AutoUno = new Auto("Volvo","Rojo");
$AutoDos = new Auto("Volvo","Rojo");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$AutoTres = new Auto("Ferrari","Rojo",125.50);
$AutoCuatro = new Auto("Ferrari","Rojo",125.50);

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$AutoCinco = new Auto("Citroen","Rojo",500, date("r"));

//Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
//al atributo precio.



 $AutoTres->MostrarAuto($AutoTres);
 $AutoCuatro->MostrarAuto($AutoCuatro);
 $AutoCinco->MostrarAuto($AutoCinco);
 echo "Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.<br><br>";
 $AutoTres->AgregarImpuestos(1500);
 $AutoCuatro->AgregarImpuestos(1500);
 $AutoCinco->AgregarImpuestos(1500);

 $AutoTres->MostrarAuto($AutoTres);
 $AutoCuatro->MostrarAuto($AutoCuatro);
 $AutoCinco->MostrarAuto($AutoCinco);

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

 //Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,5)
 $AutoUno->MostrarAuto($AutoUno);
 $AutoTres->MostrarAuto($AutoTres);
 $AutoCinco->MostrarAuto($AutoCinco);
?>