<?php
include('conexion.php');
session_start();

$mensajeRegistro = 0;
$mensajeLogin = 0;
 
if (isset($_POST['register'])) {
 
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $contrasena = $_POST['contrasena'];
    $contrasena_ser = password_hash($contrasena, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM clientes WHERE Email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);

    if(empty($nombre) || empty($email) || empty($celular)|| empty($contrasena)){
        $mensajeRegistro = 1; // Llenar todos los campos
    }
    else{
      $query->execute();
 
      if ($query->rowCount() > 0) {
        $mensajeRegistro = 2;
      }
   
      if ($query->rowCount() == 0) {
          $query = $connection->prepare("INSERT INTO clientes(Nombre,Email,Celular,Contraseña) 
          VALUES (:nombre,:email,:celular,:contrasena_ser)");
  
          $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->bindParam("celular", $celular, PDO::PARAM_STR);
          $query->bindParam("contrasena_ser", $contrasena_ser, PDO::PARAM_STR);
          
          $result = $query->execute();
   
          if ($result) {
            $mensajeRegistro = 3; 
          } else {
            $mensajeRegistro = 4; 
          }
    }   
    }
}

if (isset($_POST['login'])) {
 
  $email = $_POST['email'];
  $contrasena = $_POST['contrasena'];
 
    $query = $connection->prepare("SELECT * FROM clientes WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
      $mensajeLogin = 1; 
    } else {
        if (password_verify($contrasena, $result['Contraseña'])) {
            $_SESSION['IdCliente'] = $result['IdCliente'];
            $mensajeLogin = 2; 
        } else {
          $mensajeLogin = 1; 
          
        }
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Inicio</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<SCRIPT SRC="funciones.js"></SCRIPT> 
</head>
<body>
  <div class="main">
  <div class="header">
    
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html"> <img src="images\SolarEnergy_transparent.png" width="250" height="70"> </img> </a></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
          <li><a href="contacto.html">Contactenos</a></li>
          <li class="active"><a href="logueo.php">Ingresar</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
 
  
  <div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> 
                <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
             </li>
            <li class="nav-item text-center">
                <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Registro</a> 
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               
            <form method="post" action="" name="signin-form">
                <div class="form px-4">

                     <p class="h6" style="text-align:center" id="mensajeLogin"></p>

                     <input type="email" name="email"class="form-control" placeholder="Email"> 

                     <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">

                    <button class="btn btn-dark btn-block" type="submit" name="login" value="login" >Login</button> </div>
            </form>
            </div>
            
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form method="post" action="" name="signup-form">
                <div class="form px-4"> 

                    <p class="h6" style="text-align:center" id="mensajeRegistro"></p>

                    <input  type="text " name="nombre" class="form-control" placeholder="Nombre"> 
                   
                    <input  type="email " name="email" class="form-control" placeholder="Email"> 

                    <input  type="tel" name="celular" class="form-control" placeholder="Celular"> 

                    <input  type="password" name="contrasena" class="form-control" placeholder="Contraseña"> 
                   
                    <button class="btn btn-dark btn-block" type="input" name="register" value="register">Registrarse</button> 
                  </div>
                </form>
            </div>  
            
        </div>
    </div>
</div>
  </body>


</html>

<script>

   var mensajeRegistro = "<?php echo $mensajeRegistro; ?>";
   var mensajeLogin = "<?php echo $mensajeLogin; ?>";

   if (mensajeRegistro == 1){     
    document.getElementById("mensajeRegistro").innerHTML = "Por favor, llene todos los campos";
   }
   else if (mensajeRegistro == 2){     
    document.getElementById("mensajeRegistro").innerHTML = "El correo ya esta en uso";
   }
   else if (mensajeRegistro == 3){     
    document.getElementById("mensajeRegistro").innerHTML = "Te has registrado correctamente!";
   }
   else if (mensajeRegistro == 4){     
    document.getElementById("mensajeRegistro").innerHTML = "Ha ocurrido un error!";
   }

   if (mensajeLogin == 1){     
    document.getElementById("mensajeLogin").innerHTML = "La contraseña o email es incorrecta!";
   }
   else if (mensajeLogin == 2){     
    document.getElementById("mensajeLogin").innerHTML = "Te has logeado correctamente!";
   }

</script>