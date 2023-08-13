<?php 
	$nombre =$_POST['nombre'];
    $telefono = $_POST['telefono']; 
    $correo = $_POST['correo'];
    $tpmensaje = $_POST['tpmensaje'];
    $mensaje = $_POST['mensaje']; 

    $destinatario = "hgstonantzin19@gmail.com";
    $asunto = "Contacto desde la WEB";

    $carta = "De: $nombre \n";
    $carta .= "Telefono: $telefono \n";
    $carta .= "Correo: $correo \n";
    $carta .= "Tpmensaje: $tpmensaje \n";
    $carta .= "Mensaje: $mensaje";
    
     mail($destinatario, $asunto, $carta);
     header('Location:Envio.html'); 
 ?>