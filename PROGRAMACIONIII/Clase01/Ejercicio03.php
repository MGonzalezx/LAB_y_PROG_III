<?php
// Ejercicio 03 Martin Gonzalez
/*Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”*/ 

//$a = 6; $b = 9; $c = 8;

$a = 5; $b = 1; $c = 5;

$medio = 0;

if($a > $b && $a < $c){

    $medio = $a;
}else if($b > $a && $b < $c){
    $medio = $b;
}
else if($c > $a && $c < $b){
    $medio = $c;
}else{
    echo "No hay valor del medio<br>";
}

echo "El medio es: $medio"


?>