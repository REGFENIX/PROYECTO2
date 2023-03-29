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
			if (!isset($_POST['empresa']) && !isset($_POST['targeta'])){
				     ?>
				<form id="form_altas" method="POST" action="EMPRESAS.php">
<center><div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">REGISTRAR EMPRESA</legend>
			<table cellspacing="10" cellpadding="10">
		<tr>
			<td><label for="empresa">empresa:</label></td>
			<td><input type="text" name="empresa" id="empresa"></td>
		</tr>
			
	
	</table></fieldset></div><button type="submit" class="btn btn-dark">Registrar</button>
<button type="reset"class="btn btn-dark">Limpiar</button>



	<?php
}
else{
	require_once "conexion.php";
	$empresa= filter_var($_POST['empresa'],FILTER_SANITIZE_STRING);
	
	
	try{
		$stmt1 = $conn->prepare("INSERT INTO empresas (empresa) VALUES(?)");
		$stmt1->bind_param("s", $empresa);
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
           window.location="EMPRESAS.php";
        }
      }
    });
  } );
  </script>


		


<div id="estu"><fieldset >

	<section>
			<h2>EMPRESA</h2>
			<div class="busqueda">
				<input type="text" style="background-color:transparent; color: white "id="buscar" size="60" placeholder="Buscar por empresa, apellido o direccion ">
				<span id="contador_registros">Registros</span>
			</div>
			<table>
				<tr>
					<th class="encabezados_tabla col350">empresa</th>					
					
				</tr>
			</table>
			<table id="lista_autores">
				<tr></tr>
				
			
				<?php
				require_once "conexion.php";
				                       

				$stmt = $conn->prepare("SELECT id_empresa, empresa FROM empresas ");
		        $stmt->execute();
		        $result = $stmt->get_result();
		        if ($result->num_rows === 0) exit('No hay registros en la BD');
		        while ($row= $result->fetch_array()) {
		        	echo "<tr class='renglones_pares' id=$row[0]>";
		        	echo "<td class='col350'> $row[1]</td>";
		        	
		        
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
			<div id="dialog" title="Modificar Empresa">
				<div id="modificar">
					<form id="frm_modificar" method="POST">
						<input type="hidden" id="id_empresa" name="id_empresa">
						<input type="hidden" id="accion" name="accion" value="4">
						<label for="Mempresa">Empresa</label>
						<input type="text" id="Mempresa" name="empresa" class="grande"> <br>
					
						<input type="submit" class="modificar_empresa" value=" Modificar Empresa">
                        
					</form>
				</div>
			</div>
			
		</section>

	</fieldset></center>

<script type="text/javascript" src="js/empresaApp.js"></script>
