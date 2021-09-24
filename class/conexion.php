<?php 
	
class Conexion

{

	PROTECTED $serv="localhost";
	PROTECTED $base="mi_hospital";
	PROTECTED $user="root";
	PROTECTED $pass="";
	PROTECTED $conex;
	
	public function conexion()
	{

		try 
		{
			$this->conex=new PDO("mysql:host=".$this->serv.";dbname=".$this->base,$this->user,$this->pass);
			//echo "conexion establecida";

		} 
		
		catch (Exception $e) 
		{
			echo "error inesperado, conexion fallida".$e->getMessage();	
		}
	}




}




?>