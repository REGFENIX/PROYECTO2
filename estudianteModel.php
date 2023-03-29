
<?php
require_once 'conexion.php';

$id = $_GET["id_estudiante"];

$accion = $_GET["accion"];


if ($accion=="Eliminar") {
	$stmt = $conn->prepare("DELETE FROM estudiante WHERE id_estudiante = ?");
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
	$estudiante = $_GET["estudiante"];
	$control = $_GET["control"];
	$carrera = $_GET["carrera"];
	$genero = $_GET["genero"];
	$stmt = $conn->prepare("UPDATE  estudiante SET 
		estudiante = ?,
		numero_control = ?,	
		id_carrera = ?,	
		genero = ?
		WHERE id_estudiante = ?");	
	$stmt->bind_param("siisi", $estudiante, $control, $carrera, $genero, $id);
	$stmt->execute();
	if ($stmt->affected_rows == 1)
			echo "Actualizado";
		else
			echo "Error";
		$stmt->close();
		$conn->close();
}


		if ($accion=="BuscarAutocomplete") {
			$estudiante = "%{$_GET['estudiante']}%";

			$stmt = $conn->prepare("SELECT estudiante, numero_control,carrera.carrera, genero, id_estudiante as label FROM estudiante, carrera WHERE  carrera.id_carrera =estudiante.id_carrera AND   estudiante like ?  OR carrera like ? OR genero like ?");
			$stmt-> bind_param("sss", $estudiante, $estudiante,$estudiante);
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