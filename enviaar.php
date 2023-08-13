<?php
$nombre =$_POST['nombre'];
$telefono = $_POST['telefono']; 
$correo = $_POST['correo'];
$tpmensaje = $_POST['tpmensaje'];
$mensaje = $_POST['mensaje']; 

if(!empty($nombre)||!empty($telefono)||!empty($correo)||!empty($tpmensaje)||!empty($mensaje) ){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hgs";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }
    else{
        $SELECT = "SELECT telefono from mensaje where telefono = ? limit 1";
        $INSERT = "INSERT INTO mensaje (nombre, telefono, correo, tpmensaje, mensaje)values(?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);    
        $stmt ->bind_param("i", $telefono);
        $stmt -> execute();
        $stmt ->bind_result($telefono);
        $stmt ->store_result();
        $rnum =$stmt ->num_rows();
        if($rnum == 0){
            $stmt ->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sisss", $nombre,$telefono,$correo,$tpmensaje,$mensaje);
            $stmt -> execute();
            echo "Hemos recibido tu mensaje";   
        }
        else{
            echo "Alguien ya ha registrado ese número.";
        }
        $stmt -> close();
        $conn -> close();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filosofia.php">Misión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Contacto.html">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Comentario.php">Donativos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Localización.html">Localización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="terminos.php">Apoyos</a>
        </li>
        
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

    <section class="form_wrap">
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                <h3 class="text-center">Hemos recibido tú mensaje</h3>
                <p  class="text-center">Espera tú respuesta.</p>
            </div>
        </div>
        
        <div class="agregar text-end">
        <a class="btn btn-dark btn" href="Contacto.html"><i class="fas fa-plus"></i>Nuevo mensaje de contacto</a>
    </div>
         
    
     
    </section>
    
</body>
</html>