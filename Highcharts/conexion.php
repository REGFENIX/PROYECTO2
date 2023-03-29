<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "techvolution";

	// Crear conexión
	$conn = new mysqli($servername, $username, $password, $database);

	// Checar conexión
	if ($conn->connect_error) 
	    die("Fallo al conectar: " . $conn->connect_error());
?> 

