<?php
// Ejercicio 06 Martin Gonzalez
/*Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.*/ 



$numeros = array("NumeroUno"=>rand(1,10),"NumeroDos"=>rand(1,10),"NumeroTres"=>rand(1,10),"NumeroCuatro"=>rand(1,10),"NumeroCinco"=>rand(1,10));
$sumatoria = 0;
$promedio = 0;


foreach($numeros as $numero => $valor_numero){
    $sumatoria = $sumatoria +$valor_numero;
}

$promedio = $sumatoria / count($numeros);

if($promedio > 6){
    echo "El promedio ($promedio) es mayor a 6 <br>";
}else if($promedio < 6){
    echo "El promedio ($promedio) es menor a 6 <br>";
}else{
    echo "El promedio ($promedio) es igual a 6 <br>";
}

?>