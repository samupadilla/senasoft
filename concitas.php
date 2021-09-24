<?php 
require("class/class.php");
$login=$_SESSION['usuario'];

$tra=new trabajo();
$arr=array();
$arr[]=$_POST;
$tra1=$tra->Consulta_Citas($login);
$per=$tra->Consulta_persona($login);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consulta de citas</title>
</head>
<body>
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
    <center>
        <div>
            <h1>Consulta de citas</h1>
            <h2><?php echo $per[0]['Nombres']." ".$per[0]['Apellidos']?></h2>
            <h2>Estas son su citas</h2>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>ID CITA</th>
                    <th>FECHA Y HORA</th>
                    <th>ESPECIALIDAD</th>
                    <th>CONSULTORIO</th>
                    <th>Estado cita</th>
                    <th>Modificar cita</th>
                </tr>
            <?php 
            for($i=0;$i<sizeof($tra1);$i++){
                $id=$tra1[$i]['idCita'];
            ?>
            <tr>
                    <td><?php echo $tra1[$i]['idCita'] ?></td>
                    <td><?php echo $tra1[$i]['Fecha'] ?></td>
                    <td><?php echo $tra1[$i]['Especialidad'] ?></td>
                    <td><?php echo $tra1[$i]['No_Consultorio'] ?></td>
                    <td><?php echo $tra1[$i]['Estado_cita'] ?></td>
                    <td><?php echo'<a href=updatecita.php?id='.$id.'>'; ?>Modificar cita</a></td>
            </tr>
            <?php
            }
            ?>
            </table>
        </div>
    </center>
</body>
</html>
