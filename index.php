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
          <li class="active"><a href="index.php">Inicio</a></li>
          <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
          <li><a href="contacto.html">Contactenos</a></li>
          <li><a href="logueo.php">Ingresar</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div style="text-align:center">
   <b> Eres el visitante numero:  </b>
  
   <?php include 'contador_visitas.php';
    if(!isset($_COOKIE['valorVisita'])) {
    $_COOKIE['valorVisita'] = contadorvisitas(true);
    setcookie('valorVisita', $_COOKIE['valorVisita'] ,time() + (3000 * 30), "/");
    
    }
    echo $_COOKIE['valorVisita']
    ?>

  <div class="content">
    <div class="content_resize">
      <div class="hbg"><img src="images\renovables.jpg" width="970" height="147" alt="" /></div>
      <div class="mainbar">
        <div class="article">

          <div class="aboutus-content" style="text-align:center">
          <p>
            <b>SolarEnergy</b>  ha definido una política de calidad para direccionar el desarrollo de sus servicios y productos ofreciendo 
            soluciones de energía limpias a través de equipos como paneles solares, impulsando el desarrollo y 
            la eficacia del Sistema de Gestión de Calidad, a través del mejoramiento de los procesos, instala soluciones solares a medida según los requisitos y necesidades 
            de cada cliente buscando un fuerte impacto ambiental y social.
          </p>
        </div>

          <div id="demo" class="carousel slide" data-ride="carousel">          
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images\renovables_gente.jpg" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="images\Indigenas-en-Colombia.jpg" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="images\naturaleza.jpg" width="1100" height="500">
              </div>
            </div>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    </div>
 
  </body>

  <br>

 
</html>