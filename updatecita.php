<?php 
require("class/class.php");
session_start();
if (isset($_SESSION['usuario']))
{
    echo "<script type='text/javascript'>
        alert('Usuario no haz Iniciado Sesión, por favor Logueate!!!!');
        window.location='login_hosp.php';
        </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">}
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Actualizar citas</title>
</head>
<body>
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
            <h1>Modificar cita</h1>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $cita[0]['idCita'];?>">
                <input type="text" name="Fecha" value="<?php echo $cita[0]['Fecha'];?>"><br>
                <input type="text" name="Estado" value="<?php echo $cita[0]['Estado_cita'];?>"><br>
                <select name="estado">
                    <option value="Cancelada">Cancelada</option>
                    <option value="Aplazada">Aplazada</option>
                    <option value="Recervada">Recervada</option>
                </select><br>
                <input type="submit" name="enviar" value="Modificar">
            </form>
        </div>
    </center>
</body>
</html>
<?php 
if(isset($_POST['enviar']))
{
    $da=array();
    $da[]=$_POST;
    $update=$tra->update_cita($da);
}
    
?>