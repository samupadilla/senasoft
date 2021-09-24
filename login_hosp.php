<?php 
require("class/class.php");

if (isset($_POST["valida"])) 
   {
   
      if (isset($_POST["valida"])=="si") 

      {
      $lusu=$_POST['usuar'];
      $lcontra=$_POST['contra'];

      $tra=new Hospital();
      $tra2=$tra->login($lusu);
      

//CICLO REPETITIVO PARA EXTRAER INFORMACION DE LA BASE DE DATOS
      for ($i=0; $i<sizeof($tra2);$i++) 
      {

         $tra3=$tra2[$i]["idPersonas"];
         $tra4=$tra2[$i]["contrasena"];
         $tra5=$tra2[$i]["Rol_idRol"];

             
      }
//VALIDACION DE USUARIO CONTRA BASE DE DATOS     
      if ($lusu=("$tra3")) 
      {
//INICIO DE SESION TOMANDOLA DESDE VARIABLE 
    
            $_SESSION["usuario"]=$_POST["usuar"];
            echo "<script type='text/javascript'>
                  alert('Ingreso Autorizado');
                  </script>";
//VALIDACION DE CONTRASEÑA CON MB5 CONTRA BASE DE DATOS
         if ($contra=("$tra4")) 
         {
//VALIDACION DE ROLL PARA DEFINICION DE PERMISOS EN PAGINA
              
            if ($tra5="0") 
            {
               echo "<script type='text/javascript'>
                     alert('Ingreso De admin Autorizado');
                     window.location='principal_admin.php';
                     </script>";

            }else
            {
               if ($tra5="1") 
               {
                  echo "<script type='text/javascript'>
                        alert('Ingreso De Medico Autorizado');
                        window.location='principal_Medico.php';
                        </script>";
               }else
               {
                  if ($tra5="2") 
                  {
                     echo "<script type='text/javascript'>
                           alert('Ingreso De paciente Autorizado');
                           window.location='principal_Paciente.php';
                           </script>";
                  }
               }
            }
// ALERTA DE CONTRASEÑA INCORRECTA     
         }else
         {
            echo "<script type='text/javascript'>
                  alert('Contraseña Incorrecto');
                  window.location='login_hosp.php';
                  </script>";
         }
// ALERTA DE USUARIO INCORRECTO
      }else
      {
         echo "<script type='text/javascript'>
               alert('Usuario Incorrecto');
               window.location='login_hosp.php';
               </script>";
      }

      }
      return($lusu);
      return($contra);
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/estilo_login.css">
    <title>Ingreso Usuarios</title>
    
</head>
<!-- apertura para la imagen superior de la pagina-->    
<body>
    <img src="imagenes/logo_Hospital.jpg" class="logo">
<!-- apertura tabla de ingreso se usuarios-->        
<form class="login" action="" method="POST">
   <br>
   <h2>INGRESO DE USUARIOS</h2>
<table class="login1" >
<!-- apertura para usuario de la pagina imagen primero casilla despues-->   
   <tr class="user">
      <td>
         <img src="imagenes/usuario.jpg" class="img_user">         
      </td>
      <td>
         <input type="text" name="usuar" id="" placeholder="Usuario" class="caja">
      </td>
   </tr>
<!-- apertura para contraseña de la pagina imagen primero casilla despues-->   
   <tr class="passw">
      <td>
         <img src="imagenes/pass.jpg" class="img_pass">         
      </td>
      <td> 
         <input type="password" name="contra" id="" placeholder="Contraseña" class="caja1">
      </td>
   </tr>
</table>
<!--botones para enviar y metodo hidden para validacion -->   

      <input type="hidden" name="valida" value="si">
      <input type="submit" value="Ingresar" class="enviar">


</form>

</body>
</html>