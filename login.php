<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TECHVOLUTION</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/style.css">	
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/demo.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="icon" href="libro.ico">
</head>
<body>
	<div id="frm_login" autocomplete="off">
		<h1>INICIO DE SESION</h1>
		<form id="login">
			<div class="form-group">
				<input type="text" name="user" class="form-control" placeholder="USUARIO">
			</div>
			<div class="form-group">
				<input type="password" name="pass" class="form-control" placeholder="CONTRASEÑA">
			</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Enviar">
				</div>
		</form>
	</div>

</body>
<script src="js/demo.js"></script>

<script type="text/javascript">
	$(document).on("submit","#login", function(evento){
		evento.preventDefault();
		$.post("valida_login.php", $("#login").serialize(),
			function(respuesta){
				if (respuesta.trim()== "si") {
					location.href= "index.php";
				}
				else{
					alert(respuesta);
				}
			});
	});
</script>
</html>