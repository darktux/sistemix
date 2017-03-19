<?php
	class Conex{
		//Campos del objeto conexión
		private $con; //Campo donde se guarda la conexión
		private $resultado; //Campo donde se guardan las consultas realizadas (INSERT, SELECT, UPDATE, DELETE etc)
		private $servidor; //Campo que almacena el nombre de dominio del servidor
		private $puerto; //Campo que guarda el numero de puerto en el cual el servidor escucha
		private $base; //Campo que almacena el nombre de la base de datos a la que se van a conectar
		private $usuario; //Campo que guarda el usuario con el que se va a acceder al gestor de base de datos
		private $clave; //Campo que guarda la contraseña con la que se tendra acceso al gestor de base de datos
		//CONSTRUCTOR DE LA CLASE, SE EJECUTA AL CREAN INSTANCIAS DEL OBJETO 
		function Conex($h="localhost", $p=3306, $b="coagesaludv3", $u="root", $c="rootroot"){
	    	$this->servidor = $h; 
	    	$this->puerto = $p;
	    	$this->base = $b;
	    	$this->usuario = $u;
	    	$this->clave = $c;
	    }
	    //CONECTAR CON BASE DE DATOS
	    function conectar(){
	    	$this->con=mysql_connect($this->servidor,$this->usuario,$this->clave) or die("No se pudo conectar: ".mysql_error());
			mysql_select_db($this->base);
		}
		//EJECUTAR UNA CONSULTA SQL
		function consulta($sql=""){
			$this->resultado = mysql_query($sql,$this->con) or die('La consulta fallo: ' . mysql_error());
		}
		//LIMPIAR LOS RESULTADOS DE UNA CONSULTA PREVIA
		function limpiarConsulta(){
			mysql_free_result($this->resultado);
		}
		//CERRAR LA CONEXION CON LA BASE DE DATOS
		function desconectar(){
	    	mysql_close($this->con);
		}
		//FUNCIONES SET
		function setTodos($s, $b, $u, $c){
			$this->servidor = $h;
	    	$this->base = $b;
	    	$this->usuario = $u;
	    	$this->clave = $c;
		}
		function setHost($s){
			$this->servidor=$s;
		}
		function setBase($b){
			$this->base=$b;	
		}
		function setUsuario($u){
			$this->usuario=$u;
		}
		function setClave($c){
			$this->clave=$c;
		}
		//FUNCIONES GET
		function  getResultado(){
			return $this->resultado;
		}
	}
?>
