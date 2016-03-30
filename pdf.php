<?php
require('./fpdf/fpdf.php');


/*$connect = dbConnect();
if ($connect){				
	$result = dbQuery("SELECT * FROM "._DB_TABLE_CONCEPT." WHERE id = ".$_GET['id']." ", $connect);
	if (dbNumRows($result) > 0){
		$row = dbArrayResult($result);
	}
}else{
	echo "asasas";
}*/

class PDF extends FPDF
{
	//Cabecera de página
	function Header()
	{
		//Logo
		$this->Image('./imagenes/logoIcono.png',10,10,20);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Movernos a la derecha
		$this->Cell(80);
		//Título
		$this->Cell(30,10,utf8_decode('Factura Nº 1 (Cliente - 1)'),0,0,'C');
		//Salto de línea
		$this->Ln(20);
	}

	//Pie de página
	function Footer()
	{	
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',10);
		//Número de página
		$this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
	}

	//Tabla simple
	function BasicTable1($header)
	{
		define('EURO',chr(128));
	    //Cabecera
	    foreach($header as $col)
	        $this->Cell(37,7,$col,1);
	    	$this->Ln();
	    //Datos
	        $this->Cell(37,6,'1',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'01/10/2015 a 10/10/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();
	        $this->Cell(37,6,'2',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'11/10/2015 a 20/11/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();
	        $this->Cell(37,6,'3',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'21/10/2015 a 30/10/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();	    
	}

	//Tabla simple
	function BasicTable2($header)
	{
	    //Cabecera
	    foreach($header as $col)
	        $this->Cell(37,7,$col,1);
	    	$this->Ln();
	    //Datos
	        $this->Cell(37,6,'4',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'01/11/2015 a 10/11/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();
	        $this->Cell(37,6,'5',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'11/11/2015 a 20/11/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();
	        $this->Cell(37,6,'6',1);
	        $this->Cell(37,6,utf8_decode('Antonio Jiménez'),1);
	        $this->Cell(37,6,'Sevilla',1);
	        $this->Cell(37,6,'21/11/2015 a 30/11/2015',1);
	        $this->Cell(37,6,'1.024'.EURO,1);
	        $this->Ln();
	    
	}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();

//Títulos de las columnas
$header=array('ID CONCEPTO','NOMBRE','CIUDAD','PERIODO FACTURA', 'IMPORTE');


$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->BasicTable1($header);
$pdf->Cell(0,10,'Total: 3.072'.EURO,0,1);
$pdf->AddPage();
$pdf->BasicTable2($header);
$pdf->Cell(0,10,'Total: 3.072'.EURO,0,1);
$pdf->AliasNbPages();
$pdf->Output(); 

?>
