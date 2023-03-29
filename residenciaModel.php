
<?php
require_once 'conexion.php';

$id = $_GET["id_residencia"];

$accion = $_GET["accion"];


if ($accion=="Eliminar") {
	$stmt = $conn->prepare("DELETE FROM residencias WHERE id_residencia = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		if ($stmt->affected_rows == 1)
			echo "Borrado";
		else
			echo "Error";
		$stmt->close();
		$conn->close();
}




if ($accion=="Actualizar") {
  $alu = $_GET["alu"];
	

  $estado= $_POST['estado'];


  $stmt = $conn->prepare("UPDATE  residencias SET 
    estado = ?
    WHERE id_alumno = ?");  
  $stmt->bind_param("si",$estado , $alu);
  $stmt->execute();
  if ($stmt->affected_rows == 1)
      echo "Actualizado";
    else
      echo "Error";
    $stmt->close();
    $conn->close();
}



 if ($accion=="BuscarAutocomplete") {
			$nombre = "%{$_GET['nombre']}%";

			$stmt = $conn->prepare("SELECT estudiante, nombre, periodo, nombre_proyecto, empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado FROM residencias,estudiante, maestros, empresas WHERE residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa AND estudiante like ?  OR nombre like ? OR periodo like ?  OR nombre_proyecto like ?  OR empresa like ?  OR sector like ?  OR region like ? OR estado like ? and estado= 'PROCESO'");
			$stmt-> bind_param("ssssssss", $nombre, $nombre, $nombre, $nombre, $nombre, $nombre, $nombre, $nombre);
			$stmt->execute();
			$result = $stmt->get_result();
			$rows = $result->num_rows;
			$arreglo = array();
			while ($rows = $result->fetch_assoc()) {
				$arreglo[] = $rows;
			}
			$json_response = json_encode($arreglo);
			echo $json_response;
		}
		



		
 
?>