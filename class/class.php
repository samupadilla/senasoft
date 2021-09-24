<?php
require("conexion.php");

class Hospital extends Conexion
{
	protected $varia;

	public function crea_usu($cod,$nombr,$apelli,$telef,$direcci,$emai,$pass,$estado,$ro)

	{
		$sql="INSERT INTO persona VALUES (:cod,:nom,:apell,:telef,:direc,:emai,:contra,:esta,:rol)";

		$res=$this->conex->prepare($sql);

		$res->execute(array(":cod"=>$cod ,":nom"=>$nombr , "apell"=>$apelli , "telef"=>$telef , "direc"=>$direcci , "emai"=>$emai , "contra"=>$pass , "esta"=>$estado , "rol"=>$ro));
		echo "<script type='text/javascript'>
					alert('proceso realizado de manera satisfactoria');
					window.location='../SENASOF/crea_paciente.php';
			</script>";
	}

	public function elimina_usu($cod,$estad)
	{
		$sql="UPDATE `persona` SET `Estado`=:estado WHERE idPersonas=:cod ";
		$res=$this->conex->prepare($sql);
		$res->execute(array(":estado"=>$estad, ":cod"=>$cod));

		echo "<script type='text/javascript'>
					alert('proceso realizado de manera satisfactoria');
					window.location='../SENASOF/eliminausu.php';
			</script>";
	}

	public function modifi_usu($cod,$nombr,$apelli,$telef,$direcci,$emai,$pass,$estado,$ro)

	{
		$sql="UPDATE `persona` SET `idPersonas`=:cod,`Nombres`=:nom,`Apellidos`=:apell,`Telefono`=:telefo,`Direccion`=:direc,`Email`=:ema,`contrasena`=:con,`Estado`=:esta,`Rol_idRol`=:rol WHERE idPersonas=:cod";
		$res=$this->conex->prepare($sql);
		$res->execute(array(":cod"=>$cod ,":nom"=>$nombr , ":apell"=>$apelli , ":telefo"=>$telef , ":direc"=>$direcci , ":ema"=>$emai , ":con"=>$pass , ":esta"=>$estado , ":rol"=>$ro));
		echo "<script type='text/javascript'>
					alert('proceso realizado de manera satisfactoria');
					window.location='../SENASOF/modifi_usu.php';
			</script>";

	}

	public function consul_usu()
	{
		$sql="SELECT * FROM persona";
		$res=$this->conex->prepare($sql);
		$res->execute();
		while ($reg=$res->fetch(PDO::FETCH_ASSOC)) 
		{
				$this->varia[]=$reg;
		}
		return $this->varia;
	}

	public function login($lusu)
		{

			$sql="SELECT idPersonas, contrasena, Rol_idRol FROM persona WHERE idPersonas=:lus";
			$res=$this->conex->prepare($sql);
			$res->execute(array(":lus"=>$lusu));

			while ($reg=$res->fetch(PDO::FETCH_ASSOC)) 
		{
				$this->varia[]=$reg;
		}
		return $this->varia;
		}
 
}

		 class Trabajo extends conexion
    {
        Private $query=array();
        Private $quer=array();
        Private $que=array();
        public function Consulta_Citas($id)
        {
            $sql="SELECT cita.idCita, cita.Fecha, cita.Especialidad, cita.Estado_cita, consultorio.No_Consultorio FROM cita
            INNER JOIN Consultorio
            on cita.Consultorio_Id_Consultorio=consultorio.Id_Consultorio
            INNER JOIN persona
            on consultorio.Persona_idPersonas=persona.idPersonas
            WHERE cita.Persona_idPersonas=:id ORDER BY cita.Fecha ASC";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id));
            while($reg=$res->fetch(PDO::FETCH_ASSOC))
            {
                $this->query[]=$reg;
            }
            return $this->query;
        }
        public function Consulta_persona($id)
        {
            $sql="SELECT * FROM persona WHERE persona.idPersonas=:id";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id));
            while($reg=$res->fetch(PDO::FETCH_ASSOC))
            {
                $this->quer[]=$reg;
            }
            return $this->quer;
        }
        public function Consulta_cita_id($id)
        {
            $sql="SELECT * FROM `cita` WHERE cita.idCita=:id";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":id"=>$id));
            while($reg=$res->fetch(PDO::FETCH_ASSOC))
            {
                $this->que[]=$reg;
            }
            return $this->que;
        }
        public function update_cita($da)
        {
            $fec=$da[0]['Fecha'];
            $est=$da[0]['estado'];
            $id=$da[0]['id'];
            $sql="UPDATE cita SET Fecha=:fec, Estado_cita=:est WHERE idCita=:id";
            $res=$this->conex->prepare($sql);
            $res->execute(array(":fec"=>$fec,":est"=>$est,":id"=>$id));
            echo"<script type'text/javascript'>
            alert('Modificacion Exitosa');
            window.location='concitas.php';
            </script>";
        }
    }

    Class Citas extends Conexion
{
    public function Consultar_cita($login)
    {
        
        $sql="SELECT * FROM cita WHERE Persona_idPersonas=:id";
        $res=$this->conex->prepare($sql);
        $res->execute(array(":id"=>$login));
        while($reg=$res->fetch(PDO::FETCH_ASSOC))
        {
            $this->vector[]=$reg;
        }
        return $this->vector; 
       
    }
    public function Trae_dat($login)
    {
        
        $sql="SELECT * FROM persona WHERE idPersonas=:id";
        $res=$this->conex->prepare($sql);
        $res->execute(array(":id"=>$login));
        while($reg=$res->fetch(PDO::FETCH_ASSOC))
        {
            $this->vector[]=$reg;
        }
        return $this->vector; 
       
    }
    public function trae_citas()
    {
        $sql="SELECT * FROM especialidad";
        $res=$this->conex->prepare($sql);
        $res->execute(array());
        while($reg=$res->fetch(PDO::FETCH_ASSOC))
        {
            $this->vector[]=$reg;
        }
        return $this->vector; 
    }
    public function trae_citas1($id)
    {
        $sql="SELECT * FROM cita WHERE Especialidad_idEspecialidad=:id";
        $res=$this->conex->prepare($sql);
        $res->execute(array(":id"=>$id));
        while($reg=$res->fetch(PDO::FETCH_ASSOC))
        {
            $this->vector[]=$reg;
        }
        return $this->vector; 
    }
}








?>