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
	<title></title>
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
			$tra1=$tra->crea_usu($cod,$nombr,$apelli,$telef,$direcci,$emai,$pass,$estado,$ro);
		
		}
	?>
	</section>
</body>
</html>