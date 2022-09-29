<?php

class Usuario{

private $_nombre;
private $_clave;
private $_email;


public function __construct($nombre = "", $clave = "", $email = "") 
{
    $this->_nombre = $nombre;
    $this->_clave = $clave;
    $this->_email = $email;
      
}

public function MostrarUsuario(){

     return "Nombre: ".$this->_nombre." Clave: ".$this->_clave." E-Mail: ".$this->_email .",". PHP_EOL ;
    
    
}




public static function Alta(Usuario $miUsuario){

    if(file_exists("usuarios.csv")){
        $archivo = fopen("usuarios.csv","a");

         fwrite($archivo,$miUsuario->MostrarUsuario());
        
    }else{
        echo "El archivo no existe";
    }
}


public static function Leer($archivo){

    
    $retorno = array();

    if(file_exists($archivo)){
        $miArchivo = fopen($archivo,"r");

        while(!feof($miArchivo)){
            $linea = fgets($miArchivo);
            if(!empty($linea)){
                $data = explode(",", $linea);
                array_push($retorno, new Usuario($data[0],$data[1]));
            }
        }
    }else{
        echo "El archivo no existe";
    }


    

    fclose($miArchivo);

    return $retorno;
}

}





?>