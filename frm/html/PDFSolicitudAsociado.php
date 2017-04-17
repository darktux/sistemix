<?php  
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");

	$con= new Conex();
	$con->conectar();
    date_default_timezone_set('America/El_Salvador');
    setlocale(LC_TIME,"es_ES.UTF-8");
    $dia=date('d');
    $mes=date('m');
    $ano=date('Y');

    /*$con->consulta("SELECT * FROM");
    $i=0;$salida=array();
    while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {
    	$salida[$i]=$fila;
    	$i++;
    }
    echo json_encode($salida);*/

	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetMargins(20,10,20);
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	
	//Encabezado
	$pdf->Image("../../img/logo.png", 20, 10, 20);
	$pdf->setY(30);
	$pdf->MultiCell(0,5,utf8_decode('ASOCIACIÓN COOPERATIVA DE AHORRO Y CRÉDITO DE EMPLEADOS DEL MINISTERIO DE SALUD REGIÓN PARACENTRAL DE R.L'),0,C);
	$pdf->Cell(0,15,'SOLICITUD DE INGRESO CO-AGESALUD, DE R.L.',0,1,C);
	
	//Cuerpo
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,5,'Cojutepeque, '.strftime("%A, %d de %B de %Y %H:%M"),0,1,J);
	$pdf->Cell(0,5,utf8_decode('Señor(a)'),0,1,J);
	$pdf->Cell(71,5,utf8_decode('Secretario del Consejo de Administración de '),0,0,J);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,5,utf8_decode('"CO-AGESALUD, de R.L"'),0,1,J);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(10,5,utf8_decode('Presente.'),0,1,J);

	$pdf->Ln();
	$pdf->MultiCell(0,5,utf8_decode('Por medio de la presente solicito al Consejo de Administración ser aceptado(a) como miembro de la Asociación Cooperativa CO-AGESALUD, de R.L., comprometiéndome:'),0,J);
	$pdf->SetX(30);
	$pdf->MultiCellBlt(165,5,chr(149),utf8_decode('Aceptar y cumplir con lo dispuesto en sus Estatutos, Ley General de Asociaciones Cooperativas y su Reglamento, así como los acuerdos de resoluciones adoptadas por la Asamblea General de Asociados y del Consejo de Administración'));
	$pdf->MultiCellBlt(165,5,chr(149),utf8_decode('Pagar la cuota de ingreso de $____ (_____ Dólares de los Estados Unidos)'));
	$pdf->MultiCellBlt(165,5,chr(149),utf8_decode('Suscribir y pagar por lo menos un  certificado de aportación de $____, al momento de ser aceptado como asociado de la Cooperativa, y continuar aportando para incrementar el Capital Social de la Asociación Cooperativa'));
	
	$pdf->Ln();
	$pdf->SetFont('Arial','bu',10);
	$pdf->Cell(0,5,utf8_decode('DATOS PERSONALES.'),0,1,C);


	//Genera PDF
	$pdf->Output();
?>