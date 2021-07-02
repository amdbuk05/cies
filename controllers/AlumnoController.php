<?php
/* Declaramos las rutas de accesso  */
include_once('../models/AlumnoModel.php');
class Alumno{
    /* definimos los parametros de un alumno */
    private $matricula;
    private $nombre;
    private $ap_paterno;
    private $ap_materno;
    private $telefono;
    private $correo;
    private $posgrado;
    private $beca;
    private $estatus;
    private $referencia_banco;
    private $observaciones;
    
    /*Declaramos un avariable para identificar las funciones de un alumno*/
    private $alumno;


	public function __construct(){
		$this->alumno = new AlumnoModel();
	}
    /**
     * Declaracion de funcion que crea un nuevo alumno*/
	public function crearAlumno(){
		$this->setMatricula($_POST['matricula']);
        $this->setNombre($_POST['nombre']);
        $this->setAp_Paterno($_POST['ap_paterno']);
        $this->setAp_Materno($_POST['ap_materno']);
        $this->setTelefono($_POST['telefono']);
        $this->setCorreo($_POST['correo']);
        $this->setPosgrado($_POST['posgrado']);
        $this->setBeca($_POST['beca']);
        $this->setEstatus($_POST['estatus']);
        $this->setReferencia_Banco($_POST['referencia_banco']);
        $this->setObservaciones($_POST['observaciones']);
        
		$msg_res = $this->alumno->registrarAlumno(
		
        $this->getMatricula(),
        $this->getNombre(),
        $this->getAp_Paterno(),
        $this->getAp_Materno(),
        $this->getTelefono(),
        $this->getCorreo(),
        $this->getPosgrado(),
        $this->getBeca(),
        $this->getEstatus(),
        $this->getReferencia_banco(),
        $this->getObservaciones()
        );

		echo $msg_res;
         
	}

    
    /*Declaracion de funcion que consulta todos los alumnos registrados*/
	function consultarAlumnos(){
		$result = $this->alumno->obtenerAlumnos();
		if($result>0){
			return $result;
		}
		return false;
 	}
    
    /*Declaracion de funcion que consulta toda los informacion de un alumno especifico*/
 	function consultarAlumnoMatricula(){
                $this->setMatricula($_POST['matricula']);
		$result = $this->alumno->buscarAlumnoMatricula(); 
		if($result>0){
			return $result;
		}
		return false;
 	}
    
    /*Declaracion de funcion para actualizar los dato de un alumno*/
 	public function actualizarAlumno(){
        $this->setMatricula($_POST['matricula']);
        $this->setNombre($_POST['nombre']);
        $this->setAp_Paterno($_POST['ap_paterno']);
        $this->setAp_Materno($_POST['ap_materno']);
        $this->setTelefono($_POST['telefono']);
        $this->setCorreo($_POST['correo']);
        $this->setPosgrado($_POST['posgrado']);
        $this->setBeca($_POST['beca']);
        $this->setEstatus($_POST['estatus']);
        $this->setReferencia_Banco($_POST['referencia_banco']);
        $this->setObservaciones($_POST['observaciones']);
         
 		$r = $this->alumno->actualizarAlumno(
        
        $this->getMatricula(),
        $this->getNombre(),
        $this->getAp_Paterno(),
        $this->getAp_Materno(),
        $this->getTelefono(),
        $this->getCorreo(),
        $this->getPosgrado(),
        $this->getBeca(),
        $this->getEstatus(),
        $this->getReferencia_banco(),
        $this->getObservaciones()

        );
 		if($r){
 			echo "Se ha realizado la actualización correctamente";
            header('#');        
 		}else{
            echo "Ha ocurrido un error";
 		}
 	}
    
   /*++++++++++++++++++asignacion de valores++++++++++++++++++++++++++++*/
  
   function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    
    function getMatricula(){
        return $this->matricula;
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

    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    
    function getTelefono(){
        return $this->telefono;
    }

    /*+++++++++++++++++++++++++++*/

    function setCorreo($correo){
        $this->correo = $correo;
    }
    
    function getCorreo(){
        return $this->correo;
    }
 
    /*+++++++++++++++++++++++++++*/

     function setPosgrado($posgrado){
        $this->posgrado = $posgrado;
    }
    
    function getPosgrado(){
        return $this->posgrado;
    }
 
    /*+++++++++++++++++++++++++++*/

     function setBeca($beca){
        $this->beca = $beca;
    }
    
    function getBeca(){
        return $this->beca;
    }
 
    /*+++++++++++++++++++++++++++*/

    function setEstatus($estatus){
        $this->estatus = $estatus;
    }
    
    function getEstatus(){
        return $this->estatus;
    }

    /*+++++++++++++++++++++++++++*/

    function setReferencia_Banco($referencia_banco){
        $this->referencia_banco = $referencia_banco;
    }
    
    function getReferencia_Banco(){
        return $this->referencia_banco;
    }

    /*+++++++++++++++++++++++++++*/

    function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }
    
    function getObservaciones(){
        return $this->observaciones;
    }    

}
?>
