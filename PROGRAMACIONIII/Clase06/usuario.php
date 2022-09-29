<?php

use Usuario as GlobalUsuario;

include "accesoDatos.php";
class Usuario{

    

private $_id;
private $_nombre;
private $_apellido;
private $_clave;
private $_email;
private $_localidad;
private $_fechaRegistro;


public function __construct($id = "" , $nombre = "", $apellido = "", $clave = "", $email = "",$localidad = "",$fechaRegistro = "") 
{
    $this->_id = $id;
    $this->_nombre = $nombre;
    $this->_apellido = $apellido;
    $this->_clave = $clave;
    $this->_email = $email;
    $this->_localidad = $localidad;
    $this->_fechaRegistro = $fechaRegistro;
      
}

public function MostrarUsuario(){

     return "ID: ".$this->_id. " - ". "Nombre: ".$this->_nombre. " - "."Apellido: ".$this->_apellido. " - "  ."Clave: ".$this->_clave. " - "."E-Mail: ".$this->_email ." - "."Localidad: ".$this->_localidad . " - "."Fecha de registro: ".$this->_fechaRegistro .",". PHP_EOL;
    
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

public function AltaPDO(){

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios(NOMBRE,APELLIDO,CLAVE,EMAIL,LOCALIDAD,FECHA_DE_REGISTRO)VALUES(:nombre,:apellido,:clave,:email,:localidad,:fecha)");
    $consulta->bindValue(':nombre',$this->_nombre, PDO::PARAM_STR);
    $consulta->bindValue(':apellido',$this->_apellido, PDO::PARAM_STR);
    $consulta->bindValue(':clave',$this->_clave, PDO::PARAM_STR);
    $consulta->bindValue(':email',$this->_email, PDO::PARAM_STR);
    $consulta->bindValue(':localidad',$this->_localidad, PDO::PARAM_STR);
    $consulta->bindValue(':fecha',$this->_fechaRegistro, PDO::PARAM_STR);
    $consulta->execute();
    return $objetoAccesoDato->RetornarUltimoIdInsertado();
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