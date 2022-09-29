<?php

use Garage as GlobalGarage;

include "Ejercicio19.php";
class Garage
{

// Atributos (private - protected – public/var - static)
private  $_razonSocial;
private  $_precioPorHora;
private  $_autos;


//Constructor
public function __construct($_precioHora, $_razonSocial = "") 
{
    $this->_precioPorHora = $_precioHora;
    $this->_razonSocial = $_razonSocial;
    $this->_autos = [];
      
}

public function mostrarGarage(){

    $datos = "Nombre: ".$this->_razonSocial." Precio por hora: ".$this->_precioPorHora." Autos:".",". PHP_EOL ;
    
    $autos = $this->_autos;

    foreach($autos as $item)
    {
        $datos.=$item->MostrarAuto($item);
    }

    return $datos;
}

/*Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.*/ 
public function equals(Auto $auto){
    foreach($this->_autos as $item)
    {
        if($item->Equals($auto))
        {
            return true;
        }
    }
    return false;
}

/*Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo). */
public function add(Auto $auto)
{
    if(!($this->equals($auto))){
        array_push($this->_autos, $auto);
    }else{
        echo "<br>El auto ya está en el garage <br><br>";
    }
}

/*Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).*/ 
public function remove(Auto $auto)
{
    $index = array_search($auto, $this->_autos);
    if(($this->equals($auto))){
        unset($this->_autos[$index]);   
    }else{
        echo "<br>El auto no está en el garage <br><br>";
    }
}

/*Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
garage.csv
Se deben cargar los datos en un array de garage.
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.*/ 

public static function Alta(Garage $miGarage){

    if(file_exists("garages.csv")){
        $archivo = fopen("garages.csv","a");

         fwrite($archivo,$miGarage->mostrarGarage());
        
    }else{
        echo "El archivo no existe";
    }
}

public static function Leer(){

    
    

    if(file_exists("garages.csv")){
        $archivo = fopen("garages.csv","r");

        echo fread($archivo,filesize("garages.csv"));

       /* while(!feof($archivo)){
            $linea = fgets($archivo);
            if(!empty($linea)){
                $data = explode(",", $linea);
                array_push($retorno, new Garage($data[1],$data[2]));
            }
        }*/
    }else{
        echo "El archivo no existe";
    }



    fclose($archivo);

    
}


}
?>