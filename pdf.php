<?php
require('./fpdf/fpdf.php');
include("config.php");


class PDF extends FPDF
{
	//Cabecera de página
	function Header()
	{
		$query = "SELECT * FROM cliente c JOIN venta v WHERE c.idCliente = v.idCliente AND v.idVenta = '".$_GET['idVenta']."'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_ASSOC);

		//Logo
		$this->Image('./imagenes/logoIcono.png',10,10,20);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Movernos a la derecha
		$this->Cell(80);
		//Título
		$this->Cell(30,10,utf8_decode('Factura Nº '.$_GET['nFact'].' ('.$line['usuario'].')'),0,0,'C');
		$this->Ln(8);
		$this->Cell(190,10,utf8_decode(date("d-m-Y", strtotime($line['fecha']))),0,0,'C');
		//Salto de línea
		$this->Ln(15);
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

		$query = "SELECT * FROM venta v JOIN disco d WHERE v.idDisco = d.idDisco AND v.idVenta = '".$_GET['idVenta']."'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$cont = 0;

	    //Cabecera
	    foreach($header as $col)
	        $this->Cell(45,7,$col,1,0,'C');
	    	$this->Ln();

	    //Datos
	    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    	$cont++;
	    	$this->Cell(45,6,utf8_decode($line['titulo']),1);
	        $this->Cell(45,6,$line['precio'].''.EURO,1,0,'C');
	        $this->Cell(45,6,$line['cantidad'],1,0,'C');
	        $this->Cell(45,6,$line['cantidad']*$line['precio'].''.EURO,1,0,'R');
	        $this->Ln();
	    }	        	    
	}
}


$query = "SELECT * FROM venta WHERE idVenta = '".$_GET['idVenta']."'";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$line = mysql_fetch_array($result, MYSQL_ASSOC);

//Creación del objeto de la clase heredada
$pdf=new PDF();

//Títulos de las columnas
$header=array('DISCO','PRECIO','CANTIDAD','IMPORTE');


$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->BasicTable1($header);
$pdf->Cell(180,10,'Total: '.$line['precioTotal'].''.EURO,0,1,'R');
$pdf->AliasNbPages();
$pdf->Output(); 

?>
