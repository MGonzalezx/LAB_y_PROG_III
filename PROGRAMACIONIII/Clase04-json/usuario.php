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

     return "Nombre: ".$this->_nombre. " - " ."Clave: ".$this->_clave. " - "." E-Mail: ".$this->_email .",". PHP_EOL ;
    
}




public static function Alta(Usuario $miUsuario){

    $resultado = FALSE;
    if(file_exists("usuarios.csv")){
        $archivo = fopen("usuarios.csv","a");

        $cant = fwrite($archivo,$miUsuario->MostrarUsuario());
         if($cant > 0)
         {
             $resultado = TRUE;			
         }
         fclose($archivo);
    }else{
        echo "El archivo no existe";
    }
    return $resultado;
}


public static function Leer($archivo){

    
    $retorno = array();

    if(file_exists($archivo)){
        $miArchivo = fopen($archivo,"r");

        while(!feof($miArchivo)){


            $archAux = fgets($miArchivo);
			$usuarios = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$usuarios[0] = trim($usuarios[0]);
			if($usuarios[0] != ""){
				$retorno[] = new Usuario($usuarios[0], $usuarios[1], $usuarios[2]);
			}

        }
        fclose($miArchivo);
    }else{
        echo "El archivo no existe";
    }


    

    

    return $retorno;
}

public function VerificarClaveYEmail($clave,$email){

    if($email != $this->_email){
        echo "Usuario no registrado";
    }else if($clave != $this->_clave){
        echo "Error en los datos";
    }else{
        echo "Verificado";
    }

}

}





?>