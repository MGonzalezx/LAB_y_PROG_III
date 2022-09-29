<?php
// Ejercicio 02 Martin Gonzalez
/*Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.*/ 



for($i = 1; $i <= 3; $i++){

    if($i == 1){
        echo date("c");
        echo " - Invierno<br>";
    } else if($i == 2){
        echo date("r");
        echo " - Invierno<br>";
    }else{
        echo date("u");
        echo " - Invierno<br>";
    }
}


?>