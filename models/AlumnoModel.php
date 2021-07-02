<?php
require_once("db/Mysql.php");
define("TABLA", "alumno");

class AlumnoModel{

    private $base;
    /*Inicializamos nuestro objeto para la conexión a la base de datos*/
    public function __construct(){
        $this->base = new Mysql();
    }
    /*Este método permite crear un nuevo registro de alumno*/
    public function registrarAlumno($matricula,$nombre,$ap_paterno,$ap_materno,$telefono,$correo,$posgrado,$beca,$estatus,$referencia_banco,$observaciones){
        $this->base->conectar();
        $sql = "INSERT INTO " . TABLA;
        $sql = $sql . "(matricula,nombre,ap_paterno,ap_materno,telefono,correo,posgrado,beca,estatus,referencia_banco,observaciones)";
        $sql = $sql . " VALUES ('{$matricula}','{$nombre}','{$ap_paterno}','{$ap_materno}','{$telefono}','{$correo}','{$posgrado}',{$beca},'{$estatus}','{$referencia_banco}','{$observaciones}');";
        
        $resultado = $this->base->consulta_mysqli($sql);
        $this->base->desconectar();
        $r = "";
        if($resultado > 0){
            $r = "Se guardó con éxito...!!!";
            header('location:alumnos.html');
        } else {
            $r = "Error: ha ocurrido un error :(";
        }
        return $r;
    }
    
    /*Este método devuelve todos los registros almacenados en la tabla alumno*/
    public function obtenerAlumnos(){
        $sql = "SELECT * FROM " .TABLA;
        $query = $this->base->objetos($sql);
        return $query;      
    }
        
    /*Este método devuelve el registro de un alumno en particular*/

    public function buscarAlumnoMatricula(){
        $this->base->conectar();
        $sql = "SELECT * FROM " . TABLA . " WHERE matricula = '{$_SESSION['matricula']}'";
        $query = $this->base->objetos($sql);
        return $query;
    }
    /*Este metodo realiza la actulizacion de los datos del alumno */

    public function actualizarAlumno($matricula,$nombre,$ap_paterno,$ap_materno,$telefono,$correo,$posgrado,$beca,$estatus,$referencia_banco,$observaciones){
        $this->base->conectar();
        $sql = "UPDATE ".TABLA." SET matricula = '{$matricula}',nombre = '{$nombre}', ap_paterno = '{$ap_materno}', telefono = '{$telefono}', correo = '{$correo}', posgrado = '{$posgrado}', beca = '{$beca}', estatus = '{$estatus}', referencia_banco = '{$referencia_banco}', observaciones = '{$observaciones}';";
        
        $resultado = $this->base->consulta_mysqli($sql);                 
        $this->base->desconectar();
        return $resultado > 0;
    }

}
?>
