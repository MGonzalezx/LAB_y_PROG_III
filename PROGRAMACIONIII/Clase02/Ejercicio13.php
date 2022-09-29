<?php
// Ejercicio 13 Martin Gonzalez
/*Aplicación No 13 (Invertir palabra)
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.*/ 


$miRetorno;

function ValidarPalabra($palabra,$max) 
{
    $palabras = array("Recuperatorio", "Parcial", "Programacion");

    $retorno = 0;
   if(strlen($palabra) <= $max){

    foreach($palabras as $dato ){
        if(strcmp($palabra,$dato) == 0){
           echo "Se encontró la palabra <br>";
           $retorno = 1;
           break;
            
        }
        
       
    }
    return $retorno;
   }else{
    echo "La palabra supera la longitud permitida <br>";
    
    return $retorno;
   }
    
}


$miRetorno = ValidarPalabra("Pacial",15);
 
echo "El retorno fue: ". $miRetorno;

?>