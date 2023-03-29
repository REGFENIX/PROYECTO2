<!DOCTYPE html>
<html>
<head>
  <title>TECHVOLUTION</title>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css"  href="css/estilo.css" title="style" />
   <link rel="stylesheet" type="text/css"  href="css/misEstilos.css" title="style" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">  
  <link rel="stylesheet" href="css/jquery-ui.css">  
  <link rel="stylesheet" href="css/bootstrap.css">  




    <script src="js/demo.js"></script>
  
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.js"></script>

</head>
<body>


 <nav class="navbar navbar-expand-lg navbar-dark" id="menu" >
  <a class="navbar-brand" href="index.php"><img src="imagenes/tec.png" width=200px></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alumnos.php">ALUMNOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MAESTROS.php">MAESTROS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="CARRERAS.php">CARRERAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="EMPRESAS.php">EMPRESAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="PERIODOS.php">PERIODOS</a>
      </li>
      <?php
                if ($_SESSION["tipou"] == 'ADMINISTRADOR') {
                  
               ?>
 <li class="nav-item dropdown" id="dmenu">
        <a class="nav-link dropdown-toggle" href="RESIDENCIAS.php"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RESIDENCIAS</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a  href="RESIDENCIAS.php" class="dropdown-item" > REGISTRAR RESIDENCIA</a>
           <a  href="BUSCAR_RESIDENCIA.php" class="dropdown-item" > BUSCAR RESIDENCIA</a>
          <a  href="liberar.php" class="dropdown-item" >LIBERAR RESIDENCIA</a>
            <a  href="reportes.php" class="dropdown-item">REPORTE RESIDENCIAS</a>
            <a  href="graficas.php" class="dropdown-item">GRAFICAS RESIDENCIAS</a>
          
        </div>
      </li>

     
      <?php
}
        ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

</span> <span class="icon-user"></span><?php echo $_SESSION["usuario"]; ?>

        
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a  href="logout.php" class="dropdown-item" href="#">Salir</a>
          
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>


</nav>

    </body>

    </html>