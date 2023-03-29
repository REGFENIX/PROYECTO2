<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  die("<script>location.href='login.php';</script>");
}
?>
<?php include_once("header.php");  ?>


<fieldset >

	<section>
			<h2>RESIDENCIAS</h2>
			<div class="busqueda">
				<input type="text" style="background-color:transparent; color: white "id="buscar" size="60" placeholder="Buscar ">
				<span id="contador_registros">Registros</span>
			</div>
		<table id="lista_residencia">
				<tr>
					<th class="encabezados_tabla col200">Alumno</th>
					<th class="encabezados_tabla col200">Maestro</th>
					<th class="encabezados_tabla col200">Periodo</th>
					<th class="encabezados_tabla col350" >Proyecto</th>
					<th class="encabezados_tabla col200" >Empresa</th>
					<th class="encabezados_tabla col350">objetivo</th>
					<th class="encabezados_tabla col200">sector</th>
					<th class="encabezados_tabla col200">region</th>
					<th class="encabezados_tabla col350">Areas_aplicacion</th>
					<th class="encabezados_tabla col200">Alumnos asignados</th>
					<th class="encabezados_tabla col350">Lenguajes_programacion</th>
					<th class="encabezados_tabla col350">Bases de datos</th>
					<th class="encabezados_tabla col350">IDES</th>
					<th class="encabezados_tabla col350">Frameworks</th>
					<th class="encabezados_tabla col200" >Estado</th>




					<th class="encabezados_tabla col100"colspan="2"></th>
					
				</tr>
			
		
				<tr></tr>
				
			
				<?php
				require_once "conexion.php";
			
				
				$stmt = $conn->prepare("SELECT id_residencia, estudiante, nombre, periodo, nombre_proyecto, empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado FROM residencias,estudiante, maestros, empresas WHERE residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa ");
		        $stmt->execute();
		        $result = $stmt->get_result();
		        if ($result->num_rows === 0) exit('No hay registros en la BD');
		        while ($row= $result->fetch_array()) {
		        	echo "<center>";
		        	echo "<tr class='renglones_pares' id=$row[0]>";
		        	echo "<td class='col200'> $row[1]</td>";
		        	echo "<td class='col200'> $row[2]</td>";
		        	echo "<td class='col200'> $row[3]</td>";
		        	echo "<td class='col350'> $row[4]</td>";
		        	echo "<td class='col350'> $row[5]</td>";
		        	echo "<td class='col350'> $row[6]</td>";
		        	echo "<td class='col200'> $row[7]</td>";
		        	echo "<td class='col200'> $row[8]</td>";
		        	echo "<td class='col350'> $row[9]</td>";
		        	echo "<td class='col200'> $row[10]</td>";
		        	echo "<td class='col350'> $row[11]</td>";
		        	echo "<td class='col350'> $row[12]</td>";
		        	echo "<td class='col350'> $row[13]</td>";
		        	echo "<td class='col350'> $row[14]</td>";
		        	echo "<td class='col200'> $row[15]</td>";
		        	echo "</center>";
		        	?>

 <?php
                if ($_SESSION["tipou"] == 'ADMINISTRADOR') {
                  
               ?>              <?php
		        	echo "<td> <span class='btn_modificar icon-newspaper iconos_acciones' id='modificar'></span> ";
		        	echo " <span class='btn_eliminar icon-bin iconos_acciones' id='eliminar'></span> </td>";
		        	echo "</tr>";
		        }
		    }
		        $stmt->close();
		$conn->close();

		?>
		        
			</table>
			
		
			
		</section>

	</fieldset></center>

<script type="text/javascript" src="js/residenciaApp.js"></script>
