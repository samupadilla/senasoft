<?php 
require("class/class.php");
session_start();
if (isset($_SESSION['usuario']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='index.php';
        </script>";
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Modifica usuarios</title>
	<link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
	<header>
	<table border="" class="tabla">
		<tr>
			<td>
				
			<img src="imagenes/logo_Hospital.jpg" alt="" class="imagen1">	

			</td>

		</tr>

	</table>
	</header>
	<nav id="menu">
		
		<ul>
			<li>Personas
				<ul>
					<li><a href="elimina_usu.php">eliminar usuarios</a></li>
                    <li><a href="modifi_usu.php">modificar usuario</a></li>
                    <li><a href="crea_paciente.php">crea pacientes</a></li>
                    <li><a href="agend1_cita.php">consultar citas</a></li>
                    <li><a href="agend_cita.php">consultar citas</a></li>
                    <li><a href="cons_cita.php">consultar citas</a></li>
                    <li><a href="paciente.php">consultar citas</a></li>
                    <li><a href="concitas.php">consultar citas</a></li>
				</ul>
			</li>
		</ul>
		<ul>
			<li>cerrar
				<ul>
					<li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<br><br>
	<br><br>
	<section>

		<table border="1" width="1100" class="tabla1">
			<tr>
				<td width="100">
					Numero de documento
				</td>
				<td width="100">
					NOMBRES
				</td>
				<td width="100">
					APELLIDOS
				</td>
				<td width="100">
					TELEFONO
				</td>
				<td width="150">
					DIRECCION
				</td>
				<td width="150">
					EMAIL
				</td>
				<td width="100">
					CONTRASEÑA
				</td>
				<td width="60">
					ESTADO
				</td>
				<td width="60">
					ROL
				</td>
			</tr>
		<?php 

		$tra3=new Hospital();
		$tra4=$tra3->consul_usu();

		for ($i=0; $i<sizeof($tra4) ;$i++) 
		{ 
			

		?>
			<tr>
				<td>
					<?php echo $tra4[$i]['idPersonas']; ?>
				</td>
				<td>
					<?php echo $tra4[$i]['Nombres']; ?>
				</td>
				<td>
					<?php echo $tra4[$i]['Apellidos']; ?>
				</td>
				<td>
					<?php echo $tra4[$i]['Telefono']; ?>
				</td>
				<td>
					<?php echo $tra4[$i]['Direccion']; ?>
				</td>
				<td>
					<?php echo $tra4[$i]['Email']; ?>
				</td>
				<td>
					<?php 
						ECHO $tra4[$i]['contrasena']; 
					?>
				</td>
				<td>
					<?php 
						ECHO $tra4[$i]['Estado']; 
					?>
				</td>
				<td>
					<?php 

					 echo $tra4[$i]['Rol_idRol'];
					
					 ?>
				</td>
			</tr>
		

		<?php 
				
		}

		?>
		</table>
		<br><br>

	<form method="POST" accept-charset="utf-8">


		<input type="text" name="codigo" placeholder="Digite numero de documento">
		<input type="text" name="nombres" placeholder="digite nombres">
		<input type="text" name="apellidos" placeholder="Digite Apellidos">
		<input type="text" name="telefono" placeholder="Digite numero telefonico">
		<input type="text" name="direccion" placeholder="Digite direccion">
		<input type="text" name="email" placeholder="digite email">
		<input type="password" name="contra" placeholder="digite contraseña">
		<select name="esta">
			<option>Estado</option>
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>
		</select>
		<select name="roll">
			<option>Rol</option>
			<option value="0">Admin</option>
			<option value="1">Medico</option>
			<option value="2">Paciente</option>
		</select>
	
		<hr>
		<input type="hidden" name="Valida" placeholder="si">
		<input type="submit" name="Envia" placeholder="Enviar">
	</form>
	<?php 
		
		if (isset($_POST['Valida']) && isset($_POST['Valida'])=="si") 
		{
			
			$cod=$_POST['codigo'];
			$nombr=$_POST['nombres'];
			$apelli=$_POST['apellidos'];
			$telef=$_POST['telefono'];
			$direcci=$_POST['direccion'];
			$emai=$_POST['email'];
			$pass=$_POST['contra'];
			$estado=$_POST['esta'];
			$ro=$_POST['roll'];	

			$tra=new Hospital();
			$tra1=$tra->modifi_usu($cod,$nombr,$apelli,$telef,$direcci,$emai,$pass,$estado,$ro);
		
		}
	?>
	</section>
</body>
</html>