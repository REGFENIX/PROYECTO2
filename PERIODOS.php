<?php
session_start();
if (!isset($_SESSION["usuario"])) {
  die("<script>location.href='login.php';</script>");
}
?>
<?php include_once("header.php");  ?>

<center><div id="estu"><fieldset >
			<legend style="font-weight:bold; color:white;">REGISTROS POR PERIODOS</legend>
			<table cellspacing="10" cellpadding="10">
		<tr>
      <td><label>PERIODOS</label></td>
      <td><select name="carrrera">
         <option></option>

          
        <option>Ene-Jun 2019</option>
        <option>Ago-Dic 2019</option>
        <option>Ene-Jun 2020</option>
        <option>Ago-Dic 2020</option>
        <option>Ene-Jun 2021</option>
        <option>Ago-Dic 2021</option>
     
      </select></td>
    </tr>
			
			
		
		
		
	</table></fieldset></div><button id="boton1" type="button" class="btn btn-dark">Buscar</button>

</center>



