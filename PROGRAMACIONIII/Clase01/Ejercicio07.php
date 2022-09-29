<?php
// Ejercicio 07 Martin Gonzalez
/*Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
las estructuras while y foreach.*/ 


$numeros = array();
$contador = 0;
$cantidad = 0;

for($i=0;;$i++){
    if (($i % 2) != 0) {
        //Es un número impar
        array_push($numeros,$i);
        $contador++;
    }        
    if($contador >= 10){
        break;
    }
}

echo "Con for: <br>";
for($x = 0; $x < count($numeros); $x++) {
    echo $numeros[$x];
    echo "<br>";
  }

echo "Con while: <br>";

  while($cantidad < count($numeros)){
    echo $numeros[$cantidad];
    echo "<br>";
    $cantidad++;
  }

  echo "Con foreach: <br>";
  foreach($numeros as $numero => $valor_numero){
    echo $numeros[$numero];
    echo "<br>";
}
?>