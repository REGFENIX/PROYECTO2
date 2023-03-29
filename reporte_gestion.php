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
        $this->SetDrawColor( 117, 2, 255 );
        $this->SetFillColor(88, 0, 194);
        $this->SetTextColor(255, 255, 255);
        //ancho del borde (1mm)
        $this->SetLineWidth(1);
        //Titulo
        $this->Cell($w,9,$title,1,1,'C',true);
        //salto de linea
        $this->Ln(6);

        //logo
$this->Image('imagenes/fondo1.jpg',0,0,300,300); 
        $this->Image('imagenes/tec.png',80,8,60);
        //Arial bold 15
        $this->SetFont('Arial','B',15);
        //movernos a la derecha
        $this->Cell(50);
        //Titulo
        $this->Cell(100,10,'Reporte de Residencias de Empresarial',1,0,'C');
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
		$query="SELECT estudiante, nombre, periodo, nombre_proyecto,carrera, empresa, objetivo, alumnos_asignados, estado FROM residencias,estudiante, maestros, empresas, carrera WHERE  residencias.id_alumno =estudiante.id_estudiante and residencias.id_maestro = maestros.id_maestro  and residencias.id_empresa = empresas.id_empresa AND id_alumno=id_estudiante and estudiante.id_carrera=carrera.id_carrera and carrera.id_carrera=6";

		$result = $conn->query($query) or die($conn->error._LINE_);

		//colores, ancho de linea y fuente en negrita
          $this->SetDrawColor( 117, 2, 255 );
        $this->SetFillColor(88, 0, 194);
        $this->SetTextColor(255, 255, 255);
	
        $this->SetLineWidth(.3);
        $this->SetFont('Arial','B',6);

        //anchuras de las columnas
        $w = array(30, 25, 15, 20, 20, 20, 20, 20, 20 );
        //titulos de las columnas
        $titulosColumnas = array('Estudiante', 'Maestro', 'Periodo', 'Nombre_proyecto', 'Carrera', 'Empresa', 'Objetivo','asignados','Estado');
        for ($i=0; $i<count($titulosColumnas);$i++)  
        	$this->Cell($w[$i],7,$titulosColumnas[$i],1,0,'C',true);

        $this->Ln();
        //Restauracion de colores y fuente
        
        //Datos
        $fill = false;
        if ($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()){


$this->Cell($w[0],6,$row["estudiante"],'LR',0,'L',$fill);
$this->Cell($w[1],6,$row["nombre"],'LR',0,'L',$fill);
$this->Cell($w[2],6,$row["periodo"],'LR',0,'L',$fill);
$this->Cell($w[3],6,$row["nombre_proyecto"],'LR',0,'L',$fill);
$this->Cell($w[4],6,$row["carrera"],'LR',0,'L',$fill);
$this->Cell($w[5],6,$row["empresa"],'LR',0,'L',$fill);
$this->Cell($w[6],6,$row["objetivo"],'LR',0,'L',$fill); 	
$this->Cell($w[7],6,$row["alumnos_asignados"],'LR',0,'L',$fill);
$this->Cell($w[8],6,$row["estado"],'LR',0,'L',$fill); 
$this->Ln();
$fill = !$fill;
}
//linea de cierre
$this->Cell(array_sum($w),0,'','T');
}
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