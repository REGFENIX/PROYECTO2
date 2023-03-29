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
			if (!isset($_POST['estudiante']) && !isset($_POST['control'])){
				     ?>
				<form id="form_altas" method="POST" action="alumnos.php">
<center><div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">REGISTRAR ESTUDIANTE</legend>
			<table cellspacing="10" cellpadding="10">
		<tr>
			<td><label for="estudiante">Nombre:</label></td>
			<td><input type="text" name="estudiante" id="estudiante"></td>
		</tr>
			<tr>
			<td><label for="control">Numero de control:</label></td>
			<td><input type="text" name="control" id="control"></td>
		</tr>
		
			<tr>
				<td><label for="carrera">Carrera:</label></td>
                	<td><select name="carrera" id="carrera">
				<?php
			require_once "conexion.php";
				$stmt0 = $conn->prepare("SELECT id_carrera, carrera FROM carrera");
		        $stmt0->execute();
		        $result0 = $stmt0->get_result();
		        if ($result0->num_rows === 0) exit('No hay registros en la BD');
		        while ($row= $result0->fetch_array()) {
		        	echo "<option name='carrera' id='carrera' value='$row[0]'>$row[1]</option>";
		        
    }
		       
?>

 </select></td>


			
			
		</tr>
		
			<tr></tr>
			<tr>
			<td><label for="genero">Genero:</label></td>
			<td><input type="radio" name="genero" id="genero" value="MASCULINO" checked>Masculino
				<input type="radio" name="genero" id="genero" value="FEMENINO">Femenino</td>
		</tr>
		
		
		
	
	</table></fieldset></div><button type="submit" class="btn btn-dark">Registrar</button>
<button type="reset"class="btn btn-dark">Limpiar</button>



	<?php
}
else{
	require_once "conexion.php";
	$estudiante= filter_var($_POST['estudiante'],FILTER_SANITIZE_STRING);
	$control= filter_var($_POST['control'],FILTER_SANITIZE_STRING);
	$carrera= filter_var($_POST['carrera']);
	$genero= filter_var($_POST['genero'],FILTER_SANITIZE_STRING);
	
	try{
		$stmt1 = $conn->prepare("INSERT INTO estudiante (estudiante, numero_control, id_carrera, genero) VALUES(?,?,?,?)");
		$stmt1->bind_param("siis", $estudiante, $control, $carrera, $genero);
		$stmt1->execute();
		if ($stmt1->affected_rows==1) {
			?>
			<div id="dialog-message" title="Altas de alumnos">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
   	Registro Almacenado en la base de datos
  </p>
 
</div>
		<?php
		}
		$stmt1->close();
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
           window.location="alumnos.php";
        }
      }
    });
  } );
  </script>


		


<div id="estu"><fieldset >

	<section>
			<h2>ALUMNOS</h2>
			<div class="busqueda">
				<input type="text" style="background-color:transparent; color: white "id="buscar" size="60" placeholder="Buscar por estudiante, apellido o direccion ">
				<span id="contador_registros">Registros</span>
			</div>
			<table>
				<tr>
					<th class="encabezados_tabla col200">Nombre</th>
					<th class="encabezados_tabla col200">Numero de control</th>
					<th class="encabezados_tabla col350">Carrera</th>
					<th class="encabezados_tabla col100">Genero</th>
					<th class="encabezados_tabla col100"></th>
					
				</tr>
			</table>
			<table id="lista_autores">
				<tr></tr>
				
			
				<?php
				require_once "conexion.php";
				
				$stmt = $conn->prepare("SELECT  estudiante, nombre, periodo, nombre_proyecto, empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado FROM residencias,estudiante, maestros, empresas WHERE residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa ");

 <?php
                if ($_SESSION["tipou"] == 'ADMINISTRADOR') {
                  
               ?>              <?php
		        	echo "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> </td>";
		        	echo "<td> <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>";
		        	echo "</tr>";
		        }
		    }
		        $stmt->close();
		$conn->close();

		?>
		        
			</table>
			<div id="dialog" title="Modificar Alumno">
				<div id="modificar">
					<form id="frm_modificar" method="POST">
						<input type="hidden" id="id_estudiante" name="id_estudiante">
						<input type="hidden" id="accion" name="accion" value="4">
						<label for="Mestudiante">Nombre</label>
						<input type="text" id="Mestudiante" name="estudiante" class="grande"> <br>
						<label for="Mcontrol">control</label>
						<input type="text" id="Mcontrol" name="control" class="grande"> <br>
						<label for="Mcarrera">carrera</label>
                        <select  id="Mcarrera" name="carrera" class="grande">


				        <option  id="Mcarrera" name="carrera" class="grande" value="1">TICS</option>
				        <option  id="Mcarrera" name="carrera" class="grande" value="2">SISTEMAS</option>

                          </select> <br>







						<label for="Mgenero">genero</label>
					
                        <input type="radio" name="genero" id="Mgenero" value="MASCULINO" class="mediano" checked>Masculino
			 	        <input type="radio" name="genero" id="Mgenero" value="FEMENINO" class="mediano">Femenino<br><br>


						<input type="submit" class="modificar_estudiante" value=" Modificar Alumno">
                        
					</form>
				</div>
			</div>
			</div>
		</section>

	</fieldset></center>

<script type="text/javascript" src="js/estudiantesApp.js"></script>




