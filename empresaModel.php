<?php
require_once 'conexion.php';

$id = $_GET["id_empresa"];

$accion = $_GET["accion"];


if ($accion=="Eliminar") {
	$stmt = $conn->prepare("DELETE FROM empresas WHERE id_empresa = ?");
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
	$empresa = $_GET["empresa"];
	
	$stmt = $conn->prepare("UPDATE  empresas SET 
		empresa = ?
		WHERE id_empresa = ?");	
	$stmt->bind_param("si", $empresa, $id);
	$stmt->execute();
	if ($stmt->affected_rows == 1)
			echo "Actualizado";
		else
			echo "Error";
		$stmt->close();
		$conn->close();
}




		if ($accion=="BuscarAutocomplete") {
			$empresa = "%{$_GET['empresa']}%";
			$stmt = $conn->prepare("SELECT empresa, id_empresa as label FROM empresas WHERE  empresa like ? ");
			$stmt-> bind_param("s", $empresa);
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