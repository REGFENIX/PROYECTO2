<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  die("<script>location.href='login.php';</script>");
}
?>
<?php include_once("header.php");  ?>
<?php
                if ($_SESSION["tipou"] == 'ADMINISTRADOR') {
                  
               ?>
<?php
      //si no existen las variables se muestra el formulario
      if (!isset($_POST['nombre'])){
             ?>
             <form id="form_altas" method="POST" action="RESIDENCIAS.php">

<div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">REGISTRAR RESIDENCIA</legend>
			<table cellspacing="10" cellpadding="10">
        <tr></tr>
		 <tr>
      <td><label for="alumno">Alumno:</label></td>
      <td><select name="alumno">
        <option></option>
           <?php
      require_once "conexion.php";
        $stmt0 = $conn->prepare("SELECT id_estudiante, estudiante FROM estudiante");
            $stmt0->execute();
            $result0 = $stmt0->get_result();
            if ($result0->num_rows === 0) exit('No hay registros en la BD');
            while ($row= $result0->fetch_array()) {
              echo "<option name='alumno' id='alumno' value='$row[0]'>$row[1]</option>";
            
    }
           
?>    
      </select></td>
    </tr>
      <tr>
      <td><label for="maestro">Maestro:</label></td>
      <td><select name="maestro">
             <option></option>
           <?php
      require_once "conexion.php";
        $stmt0 = $conn->prepare("SELECT id_maestro, nombre FROM maestros");
            $stmt0->execute();
            $result0 = $stmt0->get_result();
            if ($result0->num_rows === 0) exit('No hay registros en la BD');
            while ($row= $result0->fetch_array()) {
              echo "<option name='maestro' id='maestro' value='$row[0]'>$row[1]</option>";
            
    }
           
?>    
      </select></td>
    </tr>
      <tr>
      <td><label for="periodo">Periodo:</label></td>
      <td><select name="periodo">


         <option></option>          
        <option name="periodo" id="periodo" value="Ene-Jun 2019">Ene-Jun 2019</option> 
        <option name="periodo" id="periodo" value="Ago-Dic 2019">Ago-Dic 2019</option>  
        <option name="periodo" id="periodo" value="Ene-Jun 2020">Ene-Jun 2020</option>  
        <option name="periodo" id="periodo" value="Ago-Dic 2020">Ago-Dic 2020</option>  
        <option name="periodo" id="periodo" value="Ene-Jun 2019">Ene-Jun 2019</option> 
        <option name="periodo" id="periodo" value="Ene-Jun 2021">Ene-Jun 2021</option> 
        <option name="periodo" id="periodo" value="Ago-Dic 2021">Ago-Dic 2021</option>       
     
      </select></td>
    </tr>
    <tr>
      <td><label for="proyecto">Nombre del proyecto:</label></td>
      <td><input type="text" name="proyecto" id="proyecto" size="26" ></td>
    </tr>
			<tr>
      <td><label for="empresa">Empresa/Institucion:</label></td>
      <td><select name="empresa">
             <option></option>
           <?php
      require_once "conexion.php";
        $stmt1 = $conn->prepare("SELECT id_empresa, empresa FROM empresas");
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            if ($result1->num_rows === 0) exit('No hay registros en la BD');
            while ($row= $result1->fetch_array()) {
              echo "<option name='empresa' id='empresa' value='$row[0]'>$row[1]</option>";
            
    }
           
?>          
     
      </select></td>
    </tr></table>
    
      <label id="objetivo" for="objetivo">Objetivo:</label><br>
    <textarea id="objetivo"rows="3" cols="52"  name="objetivo"></textarea>
    <table table cellspacing="10" cellpadding="10">
			<tr>
			<td><label for="sector">Sector:</label></td>
			<td><input type="radio" name="sector" id="sector"  value="PUBLICO">Publico
				<input type="radio" name="sector" id="sector" value="PRIVADO">Privado</td>
		</tr>
    <tr>
      <td><label for="region">Region:</label></td>
      <td><input type="radio" name="region" id="region" value="PUBLICO">Publico
        <input type="radio" name="region" id="region" value="PRIVADO">Privado</td>
    </tr>
<tr>
      <td><label for="area">Areas de aplicación:</label></td>
    </tr>
     <tr><td><input type="checkbox" name="area" value="Tecnologia web">Tecnologia web</td>
        <td><input type="checkbox" name="area" value="Sistemas de escritorio">Sistemas de escritorio</td>
        <td><input type="checkbox" name="area" value="Moviles">Moviles</td>
     </tr>
       <tr><td><input type="checkbox" name="area" value="Multimedia">Multimedia</td>
        <td><input type="checkbox" name="area" value="Videojuegos">Videojuegos</td>
        <td><input type="checkbox" name="area" value="Arduinos">Arduinos</td>
     </tr>
       <tr><td><input type="checkbox" name="area" value="Redes">Redes</td>
        <td><input type="checkbox" name="area" value="Usabilidad">Usabilidad</td>
          <td><input type="checkbox" name="area" value="Seguridad">Seguridad</td>
        
     </tr>
     <tr><td><input type="checkbox" name="area" value="Documentacion de sistemas">Documentacion de sistemas</td>
        <td><input type="checkbox" name="area" value="Bases de datos">Bases de datos</td>
          <td><input type="checkbox" name="area" value="Documentacion de red">Documentacion de red</td>
        
     </tr>

		 <tr>
      <td><label for="asignado">Alumnos Asignados:</label></td>
      <td><input type="radio" name="asignado" id="asignado"  value="1">1
        <input type="radio" name="asignado" id="asignado" value="2">2
        <input type="radio" name="asignado" id="asignado" value="3">3
      </td>
    </tr>
<td><label for="lenguaje">Lenguajes de programacion:</label></td>
    </tr>
     <tr><td><input type="checkbox" name="lenguaje" value="PHP">PHP</td>
        <td><input type="checkbox" name="lenguaje" value="JAVA">JAVA</td>
        <td><input type="checkbox" name="lenguaje" value="JAVASCRIPT">JAVASCRIPT</td>
     </tr>
       <tr><td><input type="checkbox" name="lenguaje" value="TYPESCRIPT">TYPESCRIPT</td>
        <td><input type="checkbox" name="lenguaje" value="C#">C#</td>
        <td><input type="checkbox" name="lenguaje" value="PYTON">PYTON</td>
     </tr>
       <tr><td><input type="checkbox" name="lenguaje" value="C++">C++</td>
        
     </tr>
     


     <tr>
      <td><label for="bases">Bases de datos:</label></td>
    </tr>
     <tr><td><input type="checkbox" name="bases" value="MYSQL">MYSQL</td>
        <td><input type="checkbox" name="bases" value="ORACLE">ORACLE</td>
        <td><input type="checkbox" name="bases" value="SQLSERVER">SQLSERVER</td>
     </tr>
       <tr><td><input type="checkbox" name="bases" value="MONGODB">MONGODB</td>
        <td><input type="checkbox" name="bases" value="POSTGRESQL">POSTGRESQL</td>
        <td><input type="checkbox" name="bases" value="FIREBASE">FIREBASE</td>
     </tr>
       <tr><td><input type="checkbox" name="bases" value="SYBASE">SYBASE</td>
        <td><input type="checkbox" name="bases" value="SQLITE">SQLITE</td>
        
     </tr>
       <tr>
      <td><label for="ides">IDES:</label></td>
    </tr>
     <tr><td><input type="checkbox" name="ides" value="SUBLIME">SUBLIME</td>
        <td><input type="checkbox" name="ides" value="VISUAL STUDIO">VISUAL STUDIO</td>
        <td><input type="checkbox" name="ides" value="VISUAL CODE">VISUAL CODE</td>
     </tr>
       <tr><td><input type="checkbox" name="ides" value="ECLIPSE">ECLIPSE</td>
        <td><input type="checkbox" name="ides" value="NETBEANS">NETBEANS</td>
        <td><input type="checkbox" name="ides" value="ANDROID STUDIO">ANDROID STUDIO</td>
     </tr>
       <tr><td><input type="checkbox" name="ides" value="IDE ARDUINO">IDE ARDUINO</td>
        <td><input type="checkbox" name="ides" value="ATOM">ATOM</td>
        
     </tr>
      <tr>
      <td><label for="frame">Frameworks de desarrollo:</label></td>
    </tr>
     <tr><td><input type="checkbox" name="frame" value="ANGULAR JS">ANGULAR JS</td>
        <td><input type="checkbox" name="frame" value="DJANGO">DJANGO</td>
        <td><input type="checkbox" name="frame" value="IARAVEL">IARAVEL</td>
     </tr>
       <tr><td><input type="checkbox" name="frame" value="SYMFONY">SYMFONY</td>
        <td><input type="checkbox" name="frame" value="RUBY ON RAILS">RUBY ON RAILS</td>
        <td><input type="checkbox" name="frame" value="REACT">REACT</td>
     </tr>
       <tr><td><input type="checkbox" name="frame" value="IONIC">IONIC</td>
        <td><input type="checkbox" name="frame" value="ASP.NET">ASP.NET</td>
        
     </tr>

     <tr>
      <td><label for="estado">Estado:</label></td>
      <td><select name="estado">
         <option></option>          
        <option name="estado" value="PROCESO">Proceso</option> 
         <option name="estado" value="FINALIZADO">Finalizado</option>       
     
      </select></td>
    </tr>


		
		
	</table></fieldset><center><button type="submit" name="Ingresar" class="btn btn-dark">Ingresar</button>
    <button type="reset"class="btn btn-dark">Limpiar</button>


   
        <?php
}
else{
  require_once "conexion.php";

  
  $alumno= $POST['alumno'];
  $maestro= $POST['maestro'];
  $periodo= $POST['periodo'];
  $proyecto= filter_var($_POST['proyecto'],FILTER_SANITIZE_STRING);
  $empresa= $POST['empresa'];
  $objetivo= filter_var($_POST['objetivo'],FILTER_SANITIZE_STRING);
  $sector= filter_var($_POST['sector'],FILTER_SANITIZE_STRING);
  $region= filter_var($_POST['region'],FILTER_SANITIZE_STRING);
  $area= $POST['area'];
   $asignado= $POST['asignado'];
    $lenguaje= $POST['lenguaje'];
     $bases= $POST['bases'];
      $ides= $POST['ides'];
       $frame= $POST['frame'];
        $estado= $POST['estado'];

  
  try{
   
    $stmt3 = $conn->prepare("INSERT INTO residencias (id_alumno, id_maestro, periodo, nombre_proyecto, id_empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt3->bind_param("iississssisssss", $alumno, $maestro, $periodo, $proyecto, $empresa, $objetivo, $sector, $region, $area, $asignado, $lenguaje, $bases, $ides, $frame, $estado);
    $stmt3->execute();
    if ($stmt3->affected_rows==1) {
      ?>
      <div id="dialog-message" title="Altas de Residencias">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Registro Almacenado en la base de datos
  </p>
 
</div>
    <?php
    
    }
    $stmt3->close();
    $conn->close();
  }
  catch(Exception $e){
    $e->getMessage();
    echo $e;
  }
}

?>
<?php
}

        ?>
    </section>
     <script>
  $( function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
           window.location="RESIDENCIAS.php";
        }
      }
    });
  } );
  </script>


