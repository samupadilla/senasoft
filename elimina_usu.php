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

		<select name="esta">
			<option>Estado</option>
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>
		</select>
	
	
		<hr>
		<input type="hidden" name="Valida" placeholder="si">
		<input type="submit" name="Envia" placeholder="Enviar">
	</form>
	<?php 
		
		if (isset($_POST['Valida']) && isset($_POST['Valida'])=="si") 
		{
			
			$cod=$_POST['codigo'];
			$estad=$_POST['esta'];
			

			$tra=new Hospital();
			$tra1=$tra->elimina_usu($cod,$estad);

		}
	?>
	</section>
</body>
</html>