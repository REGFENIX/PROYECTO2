<?php
header("Content-type: text/html; charset=UTF-8");
require('fpdf.php');

class PDF extends FPDF {
	//cabecera de pagina
	function Header(){
		global $title;
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//calculamos ancho y posicion del titulo
		$w = $this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		//colores de los bordes, fondo y texto
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        //ancho del borde (1mm)
        $this->SetLineWhith(1);
        //Titulo
        $this->Cell($w,9,$title,1,1,'C',true);
        //salto de linea
        $this->Ln(6);

        //logo

        $this->Image('imagenes/tec.png',10,8,33);
        //Arial bold 15
        $this->SetFont('Arial','B',15);
        //movernos a la derecha
        $this->Cell(70);
        //Titulo
        $this->Cell(60,10,'Reporte de Residencias',1,0,'C');
        //salto de linea
        $this->Ln(17);
	}

	//pie de pagina
	function Footer(){
		//Posicion: 1,5cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Numero de pagina
		$this->Cell(0,10,'Pag. '.$this->PAgeNo().'/{nb}',0,0,'C');
	}
	function cargarDatos(){
		require_once'conexion.php';
		$query="SELECT estudiante.nombre, maestros.nombre, periodo, nombre_proyecto, empresas.empresa, objetivo, sector, region, areas_aplicacion, alumnos_asignados, lenguajes_programacion, bases_datos, ides, frameworks, estado FROM residencias,estudiante, maestros, empresas WHERE residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa ";
		$result = $conn->query($query) or die($conn->error._LINE_);

		//colores, ancho de linea y fuente en negrita
		$this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWhith(.3);
        $this->SetFont('Arial','B',12);

        //anchuras de las columnas
        $w = array(50, 65, 30, 30, 20);
        //titulos de las columnas
        $titulosColumnas = array('Estudiante', 'Maestro', 'Periodo', 'Nombre_proyecto', 'Empresa', 'Objetivo', 'sector', 'Region', 'Areas de aplicacion', 'Alumnos asignados', 'Lenguajes_programacion', 'Bases de datos', 'IDES', 'Frameworks', 'Estado');
        for ($i=0; $i < count($titulosColumnas) ; $i++)  
        	$this->Cell($w[$i],7,$titulosColumnas[$i],1,0,'C',true);
        $this->Ln();
        //Restauracion de colores y fuente
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('Arial','',10);
        //Datos
        $fill = false;
        if ($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()){


$this->Cell($w[0],6,$row["estudiante.nombre"],'LR',0,'L',$fill);
$this->Cell($w[1],6,$row["maestros.nombre"],'LR',0,'L',$fill);
$this->Cell($w[2],6,$row["periodo"],'LR',0,'L',$fill);
$this->Cell($w[3],6,$row["nombre_proyecto"],'LR',0,'L',$fill);
$this->Cell($w[4],6,$row["empresas.empresa"],'LR',0,'L',$fill);
$this->Cell($w[5],6,$row["objetivo"],'LR',0,'L',$fill); 	
$this->Cell($w[6],6,$row["sector"],'LR',0,'L',$fill); 
$this->Cell($w[7],6,$row["region"],'LR',0,'L',$fill);
$this->Cell($w[8],6,$row["areas_aplicacion"],'LR',0,'L',$fill);
$this->Cell($w[9],6,$row["alumnos_asignados"],'LR',0,'L',$fill);
$this->Cell($w[10],6,$row["lenguajes_programacion"],'LR',0,'L',$fill);
$this->Cell($w[11],6,$row["bases_datos"],'LR',0,'L',$fill);
$this->Cell($w[12],6,$row["ides"],'LR',0,'L',$fill); 	
$this->Cell($w[13],6,$row["frameworks"],'LR',0,'L',$fill); 
$this->Cell($w[14],6,$row["estado"],'LR',0,'L',$fill); 
$this->Ln();
$fill = !$fill;
}
//linea de cierre
$this->Cell(array_sum($w),0,'','T');
}
}
  	//creacion del objeto de la clase heredada
$pdf = new PDF();
$title = 'TECHVOLUTION';
$pdf->SetTitle($title);
$pdf->AliasNbPAges();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->cargarDatos();
$pdf->Output();

?> 








        		        	}
        	# code...
        }

        }





	}
}