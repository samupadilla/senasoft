<?php
@session_start();
if (session_destroy());
echo "<script type='text/javascript'>
        alert('Haz cerrado Sesión exitosamente...!!Hasta Pronto¡¡');
        window.location='login_hosp.php';
        </script>";

?>