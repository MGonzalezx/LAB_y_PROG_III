<?php

include "Ejercicio17.php";
class Garage
{

// Atributos (private - protected – public/var - static)
private String $_razonSocial;
private float $_precioPorHora;
private  $_autos;


//Constructor
public function __construct($_precioHora, $_razonSocial = "") 
{
    $this->_precioPorHora = $_precioHora;
    $this->_razonSocial = $_razonSocial;
    $this->_autos = [];
      
}

public function mostrarGarage(){

    $datos = "Nombre: ".$this->_razonSocial." Precio por hora: ".$this->_precioPorHora."<br> Autos: <br>";
    $autos = $this->_autos;
    foreach($autos as $item)
    {
        $datos.$item->MostrarAuto($item)."</br>";
    }
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

}
?>