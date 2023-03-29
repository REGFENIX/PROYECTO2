<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GRAFICAS-TECHVOLUTION</title>

		<style type="text/css">
#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

		</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/highcharts-3d.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="code/modules/accessibility.js"></script>
<link rel="stylesheet" type="text/css"  href="estilos.css" title="style" />
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <script src="../js/jquery-3.4.1.min.js"></script>

<?php
require_once "conexion.php";
$stmt = $conn->prepare("SELECT sector, count(id_residencia) FROM residencias WHERE sector= 'PUBLICO' ");
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows === 0) exit('No hay registros en la BD');


$stmt2 = $conn->prepare("SELECT sector, count(id_residencia) FROM residencias WHERE sector= 'PRIVADO' ");
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                if ($result2->num_rows === 0) exit('No hay registros en la BD');
                
                   

?>

<figure class="highcharts-figure">
    <div id="container"></div>
    <center><p class="highcharts-description">
       Porcentaje de Residencias por sector
    </p></center>
</figure>


		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'GRAFICAS DE RESIDENCIAS'
    },

    subtitle: {
        text: 'TECHCOLUTION:http://techvolution.tonohost.com/'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Residencias',
        data: [
        <?php

while ($row= $result->fetch_array()) {
         echo "['".$row["sector"]."',".$row["count(id_residencia)"]."],";

        } ?>
        <?php
while ($row2= $result2->fetch_array()) {
         echo "['".$row2["sector"]."',".$row2["count(id_residencia)"]."]";

        } ?>
                
        ]
    }]
});
		</script>
    <div class="boton">
    <button type="button" id="grafi" onclick=" location.href='../graficas.php' "  class="btn btn-primary" ><strong>REGRESAR</strong></button>
  </div>
	</body>
</html>
