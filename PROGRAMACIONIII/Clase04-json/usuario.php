<?php

class Usuario{

private $_id;
private $_nombre;
private $_clave;
private $_email;
private $_fechaRegistro;
private $_pathFoto;

public function __construct($id = "",$nombre = "", $clave = "", $email = "", $fechaRegistro = "", $nuevopath = "") 
{
    $this->_id = $id;
    $this->_nombre = $nombre;
    $this->_clave = $clave;
    $this->_email = $email;
    $this->_fechaRegistro = $fechaRegistro;
    $this->_pathFoto = $nuevopath;
      
}

public function GetId(){
    return $this->_id;
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

public function GetFechaRegistro(){
    return $this->_fechaRegistro;
}

public function GetPathFoto(){
    return $this->_pathFoto;
}

public function SetPathFoto($value){
    $this->_pathFoto = $value;
}

public function MostrarUsuario(){

     return "ID: ". $this->_id . " - " . "Nombre: ".$this->_nombre. " - " ."Clave: ".$this->_clave. " - "." E-Mail: ".$this->_email. " - " . "Registro: ".$this->_fechaRegistro .",". PHP_EOL ;
    
}



public static function Alta(Usuario $miUsuario){

    $resultado = FALSE;
    if(file_exists("usuarios.json")){
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

public  function ToJson(){
    $retorno = '{"ID":"'. $this->_id . '","Nombre":"'. $this->_nombre .'","Clave":"'. $this->_clave .'","Email":"'. $this->_email.'","Registro":"'. $this->_fechaRegistro. '","Foto":"'.  $this->_pathFoto. '"}';
    return $retorno;
}

public  function GuardarJson(){
    $objRetorno = new stdClass();
    $objRetorno->exito = false;
    $objRetorno->mensaje = "Error en la escritura";
    $destino = "./Archivos";
    //$destino = $archivo;
    $stringEscritura = "";
    if(file_exists($destino)){ 
        $destino .= "/usuarios.json";
        if(!file_exists($destino)){
            $stringEscritura .= "[";
        } else {
            $archivo = fopen($destino, "r");
            while(!feof($archivo)){
                $stringEscritura .= fgets($archivo);
            }
            fclose($archivo);
        }
        $archivo = fopen($destino, "w");
        $stringEscritura = str_replace("]", ",", $stringEscritura);
        $stringEscritura .= $this->ToJson();
        $stringEscritura .= "]\r\n";
        $cantidad = fwrite($archivo, $stringEscritura);
        if($cantidad > 0){
            $objRetorno->exito = true;
            $objRetorno->mensaje = "Archivo escrito";
        }
        fclose($archivo);
    }   
    return json_encode($objRetorno);
}

public static function LeerJson($miArchivo){
   

    $destino = $miArchivo;
    $linea = "";
    $usuarios = array();
    if(file_exists($destino)){
        $archivo = fopen($destino, "r");
        while(!feof($archivo)){
            $linea .= fgets($archivo);
        }
        if(!empty($linea)){
            $listaUsuariosJSON = json_decode($linea);
            foreach ($listaUsuariosJSON as $usuarioJSON) {
                $nuevoUsuario = new Usuario($usuarioJSON->ID,$usuarioJSON->Nombre,$usuarioJSON->Clave,$usuarioJSON->Email,$usuarioJSON->Registro,$usuarioJSON->Foto);
                $usuarios[] = $nuevoUsuario;
            }
        }
    }
    return $usuarios;
    
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