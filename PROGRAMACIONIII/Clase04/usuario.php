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

public function GetNombre(){
    return $this->_nombre;
}

public function GetClave(){
    return $this->_clave;
}

public function GetEmail(){
    return $this->_email;
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


			/*$usuarios = explode(" - ", fgets($miArchivo));
			//http://www.w3schools.com/php/func_string_explode.asp
			$usuarios[0] = trim($usuarios[0]);
			if($usuarios[0] != ""){
				$retorno[] = new Usuario($usuarios[0], $usuarios[1], $usuarios[2]);
			}*/

            $usuarios = explode(" - ", fgets($miArchivo));
            //echo $elemento[0] . " - " . $elemento[1] . "\r\n";
            if(isset($usuarios[1])){
                $p = new Usuario($usuarios[0], $usuarios[1], $usuarios[2]);
                array_push($retorno, $p);

        }
    }
        fclose($miArchivo);
        return $retorno;
    }else{
        echo "El archivo no existe";
    }


    

    

   
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