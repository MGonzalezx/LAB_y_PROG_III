<?php

require_once "usuario.php";
require_once "producto.php";

class Venta{

    public $_id;
    public $_codBarraProducto;
    public $_idUsuario;
    public $_stockAComprar;


    public function __construct($id = NULL, $codBarraProducto = NULL, $idUsuario = NULL, $stockAComprar = NULL)
    {
        $this->_id = $id;
        $this->_codBarraProducto = $codBarraProducto;
        $this->_idUsuario = $idUsuario;
        $this->_stockAComprar = $stockAComprar;
        
    }

    public  function ToJson()
    {
        $retorno = '{"ID":"' . $this->_id . '","CodBarrasProducto":"' . $this->_codBarraProducto . '","IDUsuario":"' . $this->_idUsuario . '","StockAComprar":"' . $this->_stockAComprar . '"}';
        return $retorno;
    }

    public  function GuardarJson()
    {
        $objRetorno = new stdClass();
        $objRetorno->exito = false;
        $objRetorno->mensaje = "Error en la escritura";
        $destino = "./Archivos";
        //$destino = $archivo;
        $stringEscritura = "";
        if (file_exists($destino)) {
            $destino .= "/ventas.json";
            if (!file_exists($destino)) {
                $stringEscritura .= "[";
            } else {
                $archivo = fopen($destino, "r");
                while (!feof($archivo)) {
                    $stringEscritura .= fgets($archivo);
                }
                fclose($archivo);
            }
            $archivo = fopen($destino, "w");
            $stringEscritura = str_replace("]", ",", $stringEscritura);
            $stringEscritura .= $this->ToJson();
            $stringEscritura .= "]\r\n";
            $cantidad = fwrite($archivo, $stringEscritura);
            if ($cantidad > 0) {
                $objRetorno->exito = true;
                $objRetorno->mensaje = "Archivo escrito";
            }
            fclose($archivo);
        }
        return json_encode($objRetorno);
    }


    public static function LeerJson($miArchivo)
    {


        $destino = $miArchivo;
        $linea = "";
        $ventas = array();
        if (file_exists($destino)) {
            $archivo = fopen($destino, "r");
            while (!feof($archivo)) {
                $linea .= fgets($archivo);
            }
            if (!empty($linea)) {
                $listaventasJSON = json_decode($linea);
                foreach ($listaventasJSON as $ventaJSON) {
                    $nuevaVenta = new Venta($ventaJSON->ID, $ventaJSON->CodBarrasProducto, $ventaJSON->IDUsuario, $ventaJSON->StockAComprar);
                    $ventas[] = $nuevaVenta;
                }
            }
        }
        return $ventas;
    }

    public function RealizarVentar(){

        $retorno = false;
        $arrayUsuario = Usuario::LeerJson("./Archivos/usuarios.json");
        $arrayProducto = Producto::LeerJson("./Archivos/producto.json");

        foreach ($arrayUsuario as  $usuario) {
            foreach ($arrayProducto as $producto) {
                if($usuario->GetId() == $this->_idUsuario && $producto->_codBarras == $this->_codBarraProducto && $producto->_stock > 0){

                    $producto->RemoverStock($this);
                    $this->GuardarJson();
                    $retorno = true;

                }
            }
        }

        return $retorno;
    }

}

?>