<?php
session_start();
if (!isset($_SESSION['usuario']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='login_hosp.php';
        </script>";
}
require_once("class/class.php");
$login=80767604;
$id=$_POST["especialidad"];
$tra=new Citas();
$tra1=$tra->Trae_dat($login);
$tra2=$tra->Trae_citas1($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Paciente</title>
</head>
<header>
	<table border="" class="tabla">
		<tr>
			<td>
			<img src="imagenes/logo.jpeg" alt="" class="imagen1">	
			</td>
		</tr>
	</table>
	</header>
<body>
<nav id="menu">
		<ul>
			<li>Citas
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
			<li>Cerrar Sesión
				<ul>
					<li><a href="logout.php">Cerrar Sesión</a></li>
				</ul>
			</li>
		</ul>
</nav>
    <br><br>
    <center>
    <h2>Agenda tu cita por Especialidad</h2>
    <p><?php echo $tra1[0]["Nombres"]." ".$tra1[0]["Apellidos"];?></p>
    <p><?php echo "Documento: ".$tra1[0]["idPersonas"]."<br>"."Celular: ".$tra1[0]["Telefono"];?></p>

    <div name="base">
        <hr>
        <p>Escoge entre una de estas citas...</p>
    </div>
    <div name="formulario">
        <form action="agend1_cita" method="POST"></form>
            <table border="1">
                <tr>
                <th>Fecha</th>
                <th>Especialidad</th>
                </tr>
                <tr>
                <?php    
                for($i=0; $i<sizeof($tra2); $i++)
                {  
                ?>
                <td><center><?php echo $tra2[$i]['Fecha'];?></center></td>
                <td><center><?php echo $tra2[$i]['Especialidad'];?></center></td>
                </tr>
                <?php
                }   
                ?> 
            </table>
            <input type="submit" name="enviar" value="Agendar">
    </div>
    <br><br><br><br>
    <div>
    <img src="imagenes/descarga.jpg" width="300px" header="200px" alt="" class="imagen2">
    </div>
    </center>
</body>
</html>