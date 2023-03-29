<?php
session_start();
if (!isset($_SESSION["usuario"])) {
	die("<script>location.href='login.php';</script>");
}
?>
<?php include_once("header.php");  ?>

<center><div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">MODIFICAR EMPRESA</legend>
			<table cellspacing="10" cellpadding="10">
		<tr>
			<td><label for="nombre">Empresa:</label></td>
			<td><input type="text" name="nombre" id="nombre"></td>
		</tr>
		<tr>
			<td><label for="nombre">Nueva Epresa:</label></td>
			<td><input type="text" name="nombre" id="nombre"></td>
		</tr>
			
			
		
		
		
	</table></fieldset></div><button id="boton1" type="button" class="btn btn-dark">Actualizar</button>

</center>



