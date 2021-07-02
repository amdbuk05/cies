<?php
/* Declaramos las rutas de accesso  */
include_once('../models/PagoModel.php');
class Pagos{
    /* definimos los parametros de un pago */
    private $matricula;
    private $referencia_banco;
    private $nombre;
    private $ap_paterno;
    private $ap_materno;
    private $fecha_pago;
    private $monto_pago;
    private $concepto;
    private $anotaciones;
    
    
    /*Declaramos un avariable para identificar las funciones de un pago*/
    private $pago;


	public function __construct(){
		$this->pago = new PagoModel();
	}
    /**
     * Declaracion de funcion que crea un nuevo registro de pago*/
	public function crearPago(){
		$this->setMatricula($_POST['matricula']);
        $this->setReferencia_Banco($_POST['referencia_banco']);
        $this->setNombre($_POST['nombre']);
        $this->setAp_Paterno($_POST['ap_paterno']);
        $this->setAp_Materno($_POST['ap_materno']);
        $this->setFecha_Pago($_POST['fecha_pago']);
        $this->setFecha_Pago($_POST['monto_pago']);
        $this->setConcepto($_POST['concepto']);
        $this->setAnotaciones($_POST['anotaciones']);
        
		$msg_res = $this->pago->registrarPago(
		
        $this->getMatricula(),
        $this->getReferencia_banco(),
        $this->getNombre(),
        $this->getAp_Paterno(),
        $this->getAp_Materno(),
        $this->getFecha_Pago(),
        $this->getMonto_Pago(),
        $this->getConcepto(),
        $this->getAnotaciones()
        );

		echo $msg_res;
         
	}

    
    /*Declaracion de funcion que consulta todos los pagos registrados*/
	function consultarPagos(){
		$result = $this->pago->obtenerPagos();
		if($result>0){
			return $result;
		}
		return false;
 	}
    
    /*Declaracion de funcion que consulta toda los informacion de un alumno especifico*/
 	function consultarPagoMatricula(){
                $this->setMatricula($_POST['matricula']);
		$result = $this->pago->buscarPagoMatricula(); 
		if($result>0){
			return $result;
		}
		return false;
 	}
    
    /*Declaracion de funcion para actualizar los dato de un alumno*/
 	public function actualizarPago(){
        $this->setMatricula($_POST['matricula']);
        $this->setReferencia_Banco($_POST['referencia_banco']);
        $this->setNombre($_POST['nombre']);
        $this->setAp_Paterno($_POST['ap_paterno']);
        $this->setAp_Materno($_POST['ap_materno']);
        $this->setFecha_Pago($_POST['fecha_pago']);
        $this->setFecha_Pago($_POST['monto']);
        $this->setConcepto($_POST['concepto']);
        $this->setAnotaciones($_POST['anotaciones']);
         
 		$r = $this->pago->actualizarPago(
        
        $this->getMatricula(),
        $this->getReferencia_banco(),
        $this->getNombre(),
        $this->getAp_Paterno(),
        $this->getAp_Materno(),
        $this->getFecha_Pago(),
        $this->getMonto_Pago(),
        $this->getConcepto(),
        $this->getAnotaciones()

        );
 		if($r){
 			echo "Se ha realizado la actualización correctamente";
            header('#');        
 		}else{
            echo "Ha ocurrido un error";
 		}
     }
     
     /*Declaracion de funcion que consulta toda los informacion de un alumno especifico*/
 	    function consultarTotalPagos(){
        $this->setMatricula($_POST['matricula']);
        $result = $this->pago->totalPagos(); 
        if($result>0){
        return $result;
        }
        return false;
        }
    
   /*++++++++++++++++++asignacion de valores++++++++++++++++++++++++++++*/
  
   function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    
    function getMatricula(){
        return $this->matricula;
    }

    /*+++++++++++++++++++++++++++*/

    function setReferencia_Banco($referencia_banco){
        $this->referencia_banco = $referencia_banco;
    }
    
    function getReferencia_Banco(){
        return $this->referencia_banco;
    }

    /*+++++++++++++++++++++++++++*/


    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    function getNombre(){
        return $this->nombre;
    }

    /*+++++++++++++++++++++++++++*/   
    
    function setAp_Paterno($ap_paterno){
        $this->ap_paterno = $ap_paterno;
    }

    function getAp_Paterno(){
        return $this->ap_paterno;
    }

    /*+++++++++++++++++++++++++++*/

    function setAp_Materno($ap_materno){
        $this->ap_materno = $ap_materno;
    }
    
    function getAp_Materno(){
        return $this->ap_materno;
    }

    /*+++++++++++++++++++++++++++*/

    function setFecha_Pago($fecha_pago){
        $this->fecha_pago = $fecha_pago;
    }
    
    function getFecha_Pago(){
        return $this->fecha_pago;
    }

    /*+++++++++++++++++++++++++++*/

    function setMonto_Pago($monto_pago){
        $this->monto_pago = $monto_pago;
    }
    
    function getMonto_Pago(){
        return $this->monto_pago;
    }
 
    /*+++++++++++++++++++++++++++*/

     function setConcepto($concepto){
        $this->concepto = $concepto;
    }
    
    function getConcepto(){
        return $this->concepto;
    }
 
    /*+++++++++++++++++++++++++++*/

     function setAnotaciones($anotaciones){
        $this->anotaciones = $anotaciones;
    }
    
    function getAnotaciones(){
        return $this->anotaciones;
    }    

}
?>
