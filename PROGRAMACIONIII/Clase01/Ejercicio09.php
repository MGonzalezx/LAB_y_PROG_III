<?php
// Ejercicio 09 Martin Gonzalez
/*Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.*/ 

$lapicera = array("color"=>"","marca"=>"","trazo"=>"","precio"=>"");

$lapicera['color'] = "verde";
$lapicera['marca'] = "vic";
$lapicera['trazo'] = "grande";
$lapicera['precio'] = "125";


echo "Primera lapicera: " . $lapicera['color'] ." ".$lapicera['marca']." ". $lapicera['trazo']." ". $lapicera['precio'] . "<br>";

$lapicera['color'] = "rojo";
$lapicera['marca'] = "vicolar";
$lapicera['trazo'] = "chico";
$lapicera['precio'] = "75";

echo "Segunda lapicera: " . $lapicera['color'] ." ".$lapicera['marca']." ". $lapicera['trazo']." ". $lapicera['precio'] . "<br>";


$lapicera['color'] = "amarillo";
$lapicera['marca'] = "vicilo";
$lapicera['trazo'] = "mediano";
$lapicera['precio'] = "150";

echo "Tercera lapicera: " . $lapicera['color'] ." ".$lapicera['marca']." ". $lapicera['trazo']." ". $lapicera['precio'] . "<br>";


?>