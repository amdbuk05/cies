<?php
require_once("db/Mysql.php");
define("TABLA", "pagos");
define("TABLA2", "pagos");

class PagoModel{

    private $base;
    /*Inicializamos nuestro objeto para la conexión a la base de datos*/
    public function __construct(){
        $this->base = new Mysql();
    }
    /*Este método permite crear un nuevo registro de pago*/
    public function registrarPago($matricula,$referencia_banco,$nombre,$ap_paterno,$ap_materno,$fecha_pago,$monto_pago,$concepto,$anotaciones){
        $this->base->conectar();
        $sql = "INSERT INTO " . TABLA;
        $sql = $sql . "(matricula,referencia_banco,nombre,ap_paterno,ap_materno,fecha_pago,monto_pago,concepto,anotaciones)";
        $sql = $sql . " VALUES ('{$matricula}','{$referencia_banco}','{$nombre}','{$ap_paterno}','{$ap_materno}','{$fecha_pago}','{$monto_pago}','{$concepto}','{$anotaciones}');";
        
        $resultado = $this->base->consulta_mysqli($sql);
        $this->base->desconectar();
        $r = "";
        if($resultado > 0){
            $r = "Se guardó con éxito...!!!";
            header('#');
        } else {
            $r = "Error: ha ocurrido un error :(";
        }
        return $r;
    }
    
    /*Este método devuelve todos los registros almacenados en la tabla pagos*/
    public function obtenerPagos(){
        $sql = "SELECT * FROM " .TABLA;
        $query = $this->base->objetos($sql);
        return $query;      
    }
        
    /*Este método devuelve el registro de un pagoo en particular*/

    public function buscarPagoMatricula(){
        $this->base->conectar();
        $sql = "SELECT * FROM ".TABLA2." WHERE matricula = '{$_SESSION['matricula']}' ORDER BY fecha_pago";
        $query = $this->base->objetos($sql);
        return $query;
    }
    /*Este metodo realiza la actulizacion de los datos del pago registrado */

    public function actualizarPago($matricula,$referencia_banco,$nombre,$ap_paterno,$ap_materno,$fecha_pago,$monto_pago,$concepto,$anotaciones){
        $this->base->conectar();
        $sql = "UPDATE ".TABLA." SET matricula = '{$matricula}', referencia_banco = '{$referencia_banco}',nombre = '{$nombre}', ap_paterno = '{$ap_materno}', fecha_pago = '{$fecha_pago}', monto_pago = '{$monto_pago}', concepto = '{$concepto}', anotaciones = '{$anotaciones}';";
        
        $resultado = $this->base->consulta_mysqli($sql);                 
        $this->base->desconectar();
        return $resultado > 0;
    }

    /*Este metodo realiza la suma de todos los pagos registrados por un alumno especifico */
    public function totalPagos(){
        $this->base->conectar();
        $sql = "SELECT SUM(monto_pago) FROM ".TABLA2." WHERE matricula = '{$_SESSION['matricula']}'";
        $query = $this->base->objetos($sql);
        return $query;
    }
}
?>
