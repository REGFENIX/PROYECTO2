<?php
require_once 'conexion.php';

$id = $_GET["id_maestro"];

$accion = $_GET["accion"];


if ($accion=="Eliminar") {
	$stmt = $conn->prepare("DELETE FROM maestros WHERE id_maestro = ?");
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
	$nombre = $_GET["nombre"];
	$targeta = $_GET["targeta"];
	$genero = $_GET["genero"];
	$stmt = $conn->prepare("UPDATE  maestros SET 
		nombre = ?,
		numero_tarjeta = ?,	
		genero = ?
		WHERE id_maestro = ?");	
	$stmt->bind_param("sisi", $nombre, $targeta, $genero, $id);
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
			$stmt = $conn->prepare("SELECT nombre, numero_tarjeta, genero, id_maestro as label FROM maestros WHERE  nombre like ? OR numero_tarjeta like ? OR genero like ?");
			$stmt-> bind_param("sis", $nombre, $nombre, $nombre);
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