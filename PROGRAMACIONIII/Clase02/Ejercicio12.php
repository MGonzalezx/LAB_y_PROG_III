<?php
// Ejercicio 12 Martin Gonzalez
/*Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/ 


function PalabraAlReves($caracteres = array("H","O","L","A")) 
{

   echo $caracteres[3].$caracteres[2].$caracteres[1].$caracteres[0];
    
}

PalabraAlReves();
echo"<br>";
PalabraAlReves(array("A","L","O","H"));

      

?>