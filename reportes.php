<!DOCTYPE html>
<html>
<head>
    <title>MENU-TECHVOLUTION</title>
     <link rel="stylesheet" type="text/css"  href="css/estilo.css" title="style" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/jquery-3.4.1.min.js"></script>
</head>
 
<body background="imagenes/fondo1.jpg">
    <div class="logo"><center>      <img src="imagenes/tec.png" width="500" height="200" /><br>
        <div class="datos">
        <h1>ESCOJA UNO</h1><br>
       
    </center>
    </div>
    <button id="ingre" onclick="location=document.link.menu.options[document.link.menu.selectedIndex].value;" type="button"  class="btn btn-primary" ><strong>INGRESAR</strong></button>

   <div class="boton">
    <button type="button" id="grafi" onclick=" location.href='index.php' "  class="btn btn-primary" ><strong>REGRESAR</strong></button> </div>
    <div class="lis">
        




    <label id="lista" for="reporte">Reporte:</label>
    

<td><form name="link"><select name="menu">
   <option></option>
                    <optgroup label="Estado"> 
                    <option value="reporte_proceso.php">Residencias en proceso</option>
                    <option value="reporte_fin.php">Residencias Terminadas</option>
                  </optgroup>
                   <optgroup label="Carrera"> 
                     <option value="reporte_tics.php">TICS</option>
                     <option value="reporte_sistemas.php">SISTEMAS</option>
                     <option value="reporte_quimica.php">QUIMICA</option>
                     <option value="reporte_bioquimica.php">BIOQUIMICA</option>
                     <option value="reporte_informatica.php">INFORMATICA</option>
                     <option value="reporte_gestion.php">EMPRESARIAL</option>
                   </optgroup>

</select> 




 </div>

</body>
</html>
