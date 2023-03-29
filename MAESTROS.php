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
			if (!isset($_POST['nombre']) && !isset($_POST['targeta'])){
				     ?>
				<form id="form_altas" method="POST" action="MAESTROS.php">
<center><div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">REGISTRAR MAESTRO</legend>
			<table cellspacing="10" cellpadding="10">
		<tr>
			<td><label for="nombre">Nombre:</label></td>
			<td><input type="text" name="nombre" id="nombre"></td>
		</tr>
			<tr>
			<td><label for="targeta">Numero de tarjeta:</label></td>
			<td><input type="text" name="targeta" id="targeta"></td>
		</tr>
		
			
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
	$nombre= filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
	$targeta= ($_POST['targeta']);
	$genero= filter_var($_POST['genero'],FILTER_SANITIZE_STRING);
	
	try{
		$stmt1 = $conn->prepare("INSERT INTO maestros (nombre, numero_tarjeta, genero) VALUES(?,?,?)");
		$stmt1->bind_param("sis", $nombre, $targeta, $genero);
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
           window.location="MAESTROS.php";
        }
      }
    });
  } );
  </script>


		


<div id="estu"><fieldset >

	<section>
			<h2>MAESTROS</h2>
			<div class="busqueda">
				<input type="text" style="background-color:transparent; color: white "id="buscar" size="60" placeholder="Buscar por nombre, apellido o direccion ">
				<span id="contador_registros">Registros</span>
			</div>
			<table>
				<tr>
					<th class="encabezados_tabla col350">Nombre</th>
					<th class="encabezados_tabla col200">Numero de tarjeta</th>
					<th class="encabezados_tabla col100">Genero</th>
					<th class="encabezados_tabla col100"></th>

					
					
				</tr>
			</table>
			<table id="lista_autores">
				<tr></tr>
				
			
				<?php
				require_once "conexion.php";
				                              
				$stmt = $conn->prepare("SELECT id_maestro, nombre, numero_tarjeta, genero FROM maestros ");
		        $stmt->execute();
		        $result = $stmt->get_result();
		        if ($result->num_rows === 0) exit('No hay registros en la BD');
		        while ($row= $result->fetch_array()) {
		        	echo "<tr class='renglones_pares' id=$row[0]>";
		        	echo "<td class='col350'> $row[1]</td>";
		        	echo "<td class='col200'> $row[2]</td>";
		        	echo "<td class='col100'> $row[3]</td>";
		        
		        	?>

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
			<div id="dialog" title="Modificar Maestro">
				<div id="modificar">
					<form id="frm_modificar" method="POST">
						<input type="hidden" id="id_maestro" name="id_maestro">
						<input type="hidden" id="accion" name="accion" value="4">
						<label for="Mnombre">Nombre</label>
						<input type="text" id="Mnombre" name="nombre" class="grande"> <br>
						<label for="Mtargeta">numero de targeta</label>
						<input type="text" id="Mtargeta" name="targeta" class="grande"> <br>
						





						<label for="Mgenero">genero</label>
					
                        <input type="radio" name="genero" id="Mgenero" value="MASCULINO" class="mediano" checked>Masculino
			 	        <input type="radio" name="genero" id="Mgenero" value="FEMENINO" class="mediano">Femenino<br><br>


						<input type="submit" class="modificar_maestro" value=" Modificar Maestro">
                        
					</form>
				</div>
			</div>
			
		</section>

	</fieldset></center>

<script type="text/javascript" src="js/maestroApp.js"></script>
