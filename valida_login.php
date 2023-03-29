<?php
session_start();
require_once 'conexion.php';

$user= $_POST["user"];
$pass= $_POST["pass"];

$stmt = $conn->prepare("SELECT tipo_usuario FROM usuarios WHERE usuario = ? AND password = MD5(?) ");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();
$regs = $result ->num_rows;

if ($regs == 1) {
	//session_start();
	$respuesta = "si";
	$_SESSION["usuario"] = $user;
	while ($row = $result->fetch_array()) {
		$_SESSION["tipou"] = $row[0];
	}
}
else{
	session_destroy();//destruye la sesion
	$respuesta = "USUARIO Y/O CONTRASEÑA INCORRECTAS";
}
echo $respuesta;
?>