<?php


class Producto
{
    public $_id;
    public $_codBarras;
    public $_nombre;
    public $_tipo;
    public $_stock;
    public $_precio;


    public function __construct($id = NULL, $codBarras = NULL, $nombre = NULL, $tipo = NULL, $stock = NULL, $precio = NULL)
    {
        $this->_id = $id;
        $this->_codBarras = $codBarras;
        $this->_nombre = $nombre;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
    }

    public function MostrarProducto()
    {

        return "ID: " . $this->_id . " - " . "CodBarras: " . $this->_codBarras . " - " . "Nombre: " . $this->_nombre . " - " . "Tipo: " . $this->_tipo . " - " . "Stock: " . $this->_stock . " - " . "Precio: " . $this->_precio . "," . PHP_EOL;
    }

    public function VerificarCodBarras()
    {
        $retorno = false;
        if (strlen($this->_codBarras) == 6 && preg_match("/^[0-9]*$/", $this->_codBarras)) {
            $retorno = true;
        }

        return $retorno;
    }

    public  function ToJson()
    {
        $retorno = '{"ID":"' . $this->_id . '","CodBarras":"' . $this->_codBarras . '","Nombre":"' . $this->_nombre . '","Tipo":"' . $this->_tipo . '","Stock":"' . $this->_stock . '","Precio":"' .  $this->_precio . '"}';
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
            $destino .= "/producto.json";
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
        $productos = array();
        if (file_exists($destino)) {
            $archivo = fopen($destino, "r");
            while (!feof($archivo)) {
                $linea .= fgets($archivo);
            }
            if (!empty($linea)) {
                $listaProductosJSON = json_decode($linea);
                foreach ($listaProductosJSON as $productoJSON) {
                    $nuevoProducto = new Producto($productoJSON->ID, $productoJSON->CodBarras, $productoJSON->Nombre, $productoJSON->Tipo, $productoJSON->Stock, $productoJSON->Precio);
                    $productos[] = $nuevoProducto;
                }
            }
        }
        return $productos;
    }

    public function VerificarExistencia()
    {
        $retorno = 0;
        //$array = $this->LeerJson("./Archivos/producto.json");

        /*
        foreach ($array as $value) {
            if ($this->_codBarras == $value->_codBarras) {
                $retorno = 1;
                $value->_stock =  $value->_stock + $this->_stock;
                $value->GuardarJson();
                //echo "Actualizado";
            } else {
                $retorno = 2;
                //echo "Ingresado";
            }
        }*/

        // read file
        $data = file_get_contents('./Archivos/producto.json');

        // decode json to array
        $array = json_decode($data, true);



        foreach ($array as  $key => $value) {

            if ($this->_codBarras == $value['CodBarras']) {
                $retorno = 1;

                $array[$key]['Stock'] = $value['Stock'] + $this->_stock;
                file_put_contents('./Archivos/producto.json', json_encode($array));

                //echo "Actualizado";
            } else {
                $retorno = 2;
                //echo "Ingresado";
            }
        }


        return $retorno;
    }

    public function RemoverStock($venta)
    {
        $retorno = 0;

        // read file
        $data = file_get_contents('./Archivos/producto.json');

        // decode json to array
        $array = json_decode($data, true);



        foreach ($array as  $key => $value) {

            if ($venta->_codBarraProducto == $value['CodBarras']) {
                $retorno = 1;

                $array[$key]['Stock'] = $value['Stock'] - $venta->_stockAComprar;
                file_put_contents('./Archivos/producto.json', json_encode($array));

                //echo "Actualizado";
            } 
        }


        return $retorno;
    }
}
