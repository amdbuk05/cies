<?php

	class Mysql{
		//definir los parámetros de conexión
		private $conexion;
		private $servidor;
		private $usuario;
		private $contrasenia;
		private $base_datos;

		public function __construct()
            {
			 $this->servidor ="localhost";
			 $this->usuario = "root";
			 $this->contrasenia = "";//si tenemos se debe poner
			 $this->base_datos ="cies";
            }

/* Métodos para realizar las operaciones de conexión, consulta, ejecución de comandos y desconexión de la bd */

			public function connect(){
            $conn = new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->base_datos);
            return $conn;
        }

		/* Método para conectar a la bse datos usando mysqli */
		public function conectar(){
			if(!isset($this->conexion)){
				$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasenia,$this->base_datos);
				
			}
		}

		public function conectar_mysql(){
			if(!isset($this->conexion)){
				$this->conexion = mysql_connect($this->servidor, $this->usuario, $this->contrasenia,$this->base_datos) or die (mysql_error());
			}
		}

		/*Este método permite realizar una consulta a la base de datos
			INPUT: 
			$sql | código sql para realizar la consulta
			OUTPUT:
			$result
		*/
		public function consulta_mysql($sql){
			$result = mysql_query($sql, $this->conexion);
			if(!$result){
				echo "MySQL ERROR: " . mysql_error();
			}
			return $result;
		}

		/*Este método permite realizar una consulta a la base de datos
			INPUT: 
			$sql | código sql para realizar la consulta
			OUTPUT:
			$result
		*/
		public  function consulta_mysqli($sql){
		
			$result = mysqli_query($this->conexion, $sql);
			if(!$result){
				echo "MySQL ERROR: " . mysqli_error($this->conexion);
			}
			return $result;
		}

		/*
			Este método permite contar el número de filas que contiene
			una consulta o número de resultados
			INPUT:
			$result;
			OUTPUT:
			número de registros encontrados en la consulta
		*/
		public function numero_filas_mysqli($result){
			//is_resource comprueba si una variable es un recurso
			//devuelve un valor true si la variable es un recurso
			// o un false, si NO es un recurso
			if(!is_resource($result)){
				return false;
			}
			return mysqli_num_rows($result);
		}

		public function numero_filas_mysql($result){
			//is_resource comprueba si una variable es un recurso
			//devuelve un valor true si la variable es un recurso
			// o un false, si NO es un recurso
			if(!is_resource($result)){
				return false;
			}
			return mysql_num_rows($result);
		}

		/*
			Este método permite retornar una consulta en forma de 
			arreglo (array)
			INPUT:
			$result
			OUTPUT:
			array con los resultados de la consulta
		*/
		public function fetch_assoc_mysqli($result){
			if(!is_resource($result)){
				return false;
			}
			return mysqli_fetch_array($result,MYSQLI_NUM);
		}

		/*
			Este método permite retornar una consulta en forma de 
			arreglo (array)
			INPUT:
			$result
			OUTPUT:
			array con los resultados de la consulta
		*/
		public function fetch_assoc_mysql($result){
			if(!is_resource($result)){
				return false;
			}
			return mysql_fetch_array($result);
		}

		/*
			Este método permite crear un array de objetos 
			desde un consulta
		*/
		public function objetos($sql){
			
			$this->conectar();
			$result = $this->conexion->query($sql);
			while($array = $result->fetch_array(MYSQLI_BOTH)){
				$objetos[] = $array;
			}
			return $objetos;
		}

		/*
			Este método  permite cerrar la conexión a la base de datos
		*/
		public function desconectar_mysql(){
			mysql_close($this->conexion);
		}

		/*
			Este método  permite cerrar la conexión a la base de datos
		*/
		public function desconectar(){
			mysqli_close($this->conexion);
		}

	}

?>