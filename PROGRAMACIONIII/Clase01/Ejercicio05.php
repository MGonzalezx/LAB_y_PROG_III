<?php
// Ejercicio 05 Martin Gonzalez
/*Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.*/ 



$num = 20;
$f = new NumberFormatter("es", NumberFormatter::SPELLOUT);

for($num; $num <= 60; $num++){
    echo $f->format($num) ;
    echo "<br>";
}


?>