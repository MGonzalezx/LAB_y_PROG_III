<?php
// Ejercicio 10 Martin Gonzalez
/*Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.*/ 


echo "Array indexado: <br>";

$arrayIndexado = array (
    array("verde","vic","grande",125),
    array("rojo","vicolor","mediano",150),
    array("amarillo","vicalor","chico",75)
  );
    
  /*echo $arrayIndexado[0][0].": Marca: ".$arrayIndexado[0][1].", Tamaño: ".$arrayIndexado[0][2]. ", Precio: ". $arrayIndexado[0][3] .".<br>";
  echo $arrayIndexado[1][0].": Marca: ".$arrayIndexado[1][1].", Tamaño: ".$arrayIndexado[1][2]. ", Precio: ". $arrayIndexado[1][3] .".<br>";
  echo $arrayIndexado[2][0].": Marca: ".$arrayIndexado[2][1].", Tamaño: ".$arrayIndexado[2][2]. ", Precio: ". $arrayIndexado[2][3] .".<br>";*/
 


  //<ul> lista no ordenada
  //<p> parrafo
  // bold, negrita
  //li declara cada uno de los elementos de una lista
  for ($fila = 0; $fila < 3; $fila++) {
    echo "<p><b>Fila numero $fila</b></p>";
    echo "<ul>";
    for ($columna = 0; $columna < 4; $columna++) {
      echo "<li>".$arrayIndexado[$fila][$columna]."</li>";
    }
    echo "</ul>";
  }

  echo "Array asociativo: <br>";

    $arrayAsociativo = array (
        array("color"=>"verde","marca"=>"vic","trazo"=>"mediano","precio"=>125),
        array("color"=>"rojo","marca"=>"vicolor","trazo"=>"grande","precio"=>150),
        array("color"=>"amarillo","marca"=>"vicalor","trazo"=>"chico","precio"=>75)
      );

      echo "<ul>";
      echo "<li>".$arrayAsociativo[0]['color'].": Marca: ".$arrayAsociativo[0]['marca'].", Tamaño: ".$arrayAsociativo[0]['trazo']. ", Precio: ". $arrayAsociativo[0]['precio'] ."</li>";
      echo "<li>".$arrayAsociativo[1]['color'].": Marca: ".$arrayAsociativo[1]['marca'].", Tamaño: ".$arrayAsociativo[1]['trazo']. ", Precio: ". $arrayAsociativo[1]['precio'] ."</li>";
      echo "<li>".$arrayAsociativo[2]['color'].": Marca: ".$arrayAsociativo[2]['marca'].", Tamaño: ".$arrayAsociativo[2]['trazo']. ", Precio: ". $arrayAsociativo[2]['precio'] ."</li>";
      echo "</ul>";

      

   
  
?>