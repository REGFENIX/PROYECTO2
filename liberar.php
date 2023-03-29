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
      if (!isset($_POST['buscar'])){
       
             ?>
             <form id="form_altas" method="POST" action="liberar.php">

<div id="estu"><fieldset >
      <legend style="font-weight:bold; color:white;">REGISTRAR RESIDENCIA</legend>
      <table cellspacing="10" cellpadding="10">
        <tr></tr>
     <tr>
      <td><label for="alumno">Alumno:</label></td>
      <td><select name="alumno">

           <?php
      require_once "conexion.php";

        $stmt0 = $conn->prepare("SELECT id_estudiante, estudiante FROM estudiante");
            $stmt0->execute();
            $result0 = $stmt0->get_result();
            if ($result0->num_rows === 0) exit('No hay registros en la BD');
            while ($row= $result0->fetch_array()) {
              echo "<option name='alumno' id='alumno' value='$row[0]'>$row[1]</option> ";
            
    }
           
?>    
      </select><td> <button type="submit" class="btn btn-dark" value="buscar">Buscar</button></td>
    </tr>

<?php
if (isset($_POST['alumno'])) {
  # code...

$alumno= $_POST['alumno'];
}
if ($alumno!="") {

    $stmt = $conn->prepare("SELECT id_alumno , estudiante, nombre, periodo, nombre_proyecto, empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado FROM residencias,estudiante, maestros, empresas WHERE id_alumno = ? and residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa ");
    $stmt->bind_param("i", $alumno);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 0) exit('No hay registros en la BD');
            while ($row= $result->fetch_array()) {
  ?>


  <tr>
      <td><label for="alu">Alumno:</label></td>
      <td>
        
           <?php
               echo "<input type='text' name='alu' id='alu' size='26' disabled='disabled' value='$row[1]' placeholder='$row[0]'>"; 
            
    ?>
  
      
     </td>
    </tr>
      <tr>
      <td><label for="maestro">Maestro:</label></td>
      <td><select name="maestro" disabled="disabled">
        
           <?php
              echo "<option name='maestro' id='maestro' >$row[2]</option>";
            
    ?>
  
      
      </select></td>
    </tr>
      <tr>
      <td><label for="periodo">Periodo:</label></td>
      <td><select name="periodo"disabled="disabled">


              <?php
              echo "<option name='periodo' id='periodo' >$row[3]</option>";
            
    ?>    
     
      </select></td>
    </tr>
    <tr>
      <td><label for="proyecto">Nombre del proyecto:</label></td>
<td>
            <?php
              echo "<input type='text' name='proyecto' id='proyecto' size='26' disabled='disabled' placeholder='$row[4]'>";
            
    ?>
      </td>
    </tr>
      <tr>
      <td><label for="empresa">Empresa/Institucion:</label></td>
      <td><select name="empresa" disabled="disabled">
            
            <?php
              echo "<option name='empresa' id='empresa' >$row[5]</option>";
            
    ?>    
           
         
     
      </select></td>
    </tr></table>
    
      <label id="objetivo" for="objetivo">Objetivo:</label><br>

       <?php
              echo "<textarea id='objetivo'rows='3' cols='52'  name='objetivo'disabled='disabled'> $row[6]</textarea>";
            
    ?>    
    
    <table table cellspacing="10" cellpadding="10">
      <tr>
      <td><label for="sector">Sector:</label>
          <?php
              echo "<input type='text' name='sector' id='sector' size='26' disabled='disabled' placeholder='$row[7]'>";
            
    ?>
      </td>
    </tr>
    <tr>
      <td><label for="genero">Region:</label>
  <?php
              echo "<input type='text' name='genero' id='genero' size='26' disabled='disabled' placeholder='$row[8]'>";
            
    ?>
      </td>
    </tr>
<tr>
      <td><label for="area">Areas de aplicación:</label>

  <?php
              echo "<input type='text' name='area' id='area' size='26' disabled='disabled' placeholder='$row[9]'>";
            
    ?>
      </td>
        
     </tr>

     <tr>
      <td><label for="genero">Alumnos Asignados:</label>  <?php
              echo "<input type='text' name='genero' id='genero' size='26' disabled='disabled' placeholder='$row[10]'>";
            
    ?>
      </td>
    </tr>
<td><label for="lenguaje">Lenguajes de programacion:</label>  <?php
              echo "<input type='text' name='lenguaje' id='lenguaje' size='26' disabled='disabled' placeholder='$row[11]'>";
            
    ?>
        </td>
     </tr>
     


     <tr>
      <td><label for="bases">Bases de datos:</label>  <?php
              echo "<input type='text' name='bases' id='bases' size='26' disabled='disabled' placeholder='$row[12]'>";
            
    ?></td>
        
     </tr>
       <tr>
      <td><label for="ides">IDES:</label>  <?php
              echo "<input type='text' name='ides' id='ides' size='26' disabled='disabled' placeholder='$row[13]'>";
            
    ?></td>
        
     </tr>
      <tr>
      <td><label for="frame">Frameworks de desarrollo:</label>  <?php
              echo "<input type='text' name='frame' id='frame' size='26' disabled='disabled' placeholder='$row[14]'>";
            
    ?></td>
        
     </tr>

     <tr>
      <td><label for="estado">Estado:</label></td>
      <td><select name="estado" >
         <option></option>          
        <option name="estado" value="PROCESO">Proceso</option> 
         <option  name="estado" value="FINALIZADO">Finalizado</option>       
     
      </select></td>
    </tr>


    
    
  </table></fieldset><center><button type="submit" class="btn btn-dark" name="btn_actualizar">Actualiza</button>
    <button type="reset"class="btn btn-dark">Limpiar</button>


    <center></div>
        <?php
        if(isset($_POST['btn_actualizar'])){
  $alumno= $_POST['alumno'];

  $estado= $_POST['estado'];


  $stmt = $conn->prepare("UPDATE  residencias SET 
    estado = ?
    WHERE id_alumno = ?");  
  $stmt->bind_param("si",$estado , $alumno);
  $stmt->execute();
  if ($stmt->affected_rows == 1)
      echo "Actualizado";
    else
      echo "Error";
    $stmt->close();
    $conn->close();
}


          # code...
}
      }
            
}

}


  ?>



<script type="text/javascript" src="js/residenciaApp.js"></script>