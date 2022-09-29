<?php
// Ejercicio 01 Martin Gonzalez
/*Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/ 

$sumatoria = 0;
$contador = 0;
$maximo = 1000;

for($i = 1; ; $i++){

   
        echo "Resultado actual: $sumatoria <br>";
        echo "Numero sumado: $i<br>";
        $sumatoria = $sumatoria + $i;
        $contador++;
    
    
    if($sumatoria >= 1000){
        break;
    }
  }
  
  echo "Al final se sumaron : $contador numeros <br>"

?>