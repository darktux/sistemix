<?php  
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");
	require_once("../php/funciones.php");

	$con= new Conex();
	$con->conectar();
    date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');
    $corr=$_GET['id'];
    //$dia=date('d');
    //$mes=date('m');
    //$ano=date('Y');

    //Obtengo el monto de aportacion
    $rs=mysql_query("SELECT tipocuenta_montoapertura FROM tab_tipo_cuenta WHERE tipocuenta_correlativo='01'");
    if ($row = mysql_fetch_row($rs)) {
    	$monto = trim($row[0]);
    }

    $con->consulta("SELECT * FROM tab_asociado WHERE asociado_correlativo='".$corr."'");
    $rs=$con->getResultado();
    $row=mysql_fetch_array($rs);

    $rs2=mysql_query("SELECT * FROM tab_institucion_salud WHERE institucionsalud_id=".$row['asociado_institucionsaludid']);
    if ($row2 = mysql_fetch_row($rs2)) {
    	$institucion = trim($row2[1]);
    }
    //$nom=trim($row['asociado_nombre']);
    
    //Convierto el monto a letras
    $texto=numeroATexto($monto);

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
	$pdf->Cell(0,5,'Cojutepeque, '.strftime("%d de %B de %Y"),0,1,J);
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
	$pdf->MultiCellBlt(165,5,chr(149),utf8_decode('Pagar la cuota de ingreso de $ '.$monto.' ('.$texto.' dólares de los Estados Unidos)'));
	$pdf->MultiCellBlt(165,5,chr(149),utf8_decode('Suscribir y pagar por lo menos un  certificado de aportación de $____, al momento de ser aceptado como asociado de la Cooperativa, y continuar aportando para incrementar el Capital Social de la Asociación Cooperativa'));
	
	$pdf->Ln();
	$pdf->SetFont('Arial','bu',10);
	$pdf->Cell(0,5,utf8_decode('DATOS PERSONALES.'),0,1,C);

	$pdf->Ln();
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(16,5,utf8_decode("Nombre: "));
	$pdf->Cell(120,5,utf8_decode(trim($row['asociado_nombre'])),'B');
	$pdf->Cell(14,5,utf8_decode(" DUI N°: "));
	$pdf->Cell(0,5,utf8_decode(trim($row['asociado_dui'])),'B',1);
	$pdf->Cell(24,5,utf8_decode('Extendido en: '),0,0);
	$pdf->Cell(100,5,utf8_decode(trim($row['asociado_extendido'])),'B');
	$pdf->Cell(20,5,utf8_decode('con fecha: '),0,0);
	$pdf->Cell(0,5,utf8_decode(trim(strftime("%d-%m-%Y",$row['asociado_fechaextendido']))),'B',1);
	$pdf->Cell(11,5,utf8_decode('Edad: '),0,0);
	$pdf->Cell(6,5,utf8_decode(edad(trim($row['asociado_fechanacimiento']))),'B',0);
	$pdf->Cell(56,5,utf8_decode('años; lugar y fecha de nacimiento: '),0,0);
	$pdf->Cell(0,5,utf8_decode($row['asociado_lugarnacimiento'].', '.strftime("%d de %B de %Y",$row['asociado_fechanacimiento'])),'B',1);
	$pdf->Cell(23,5,utf8_decode('Nacionalidad: '),0,0);
	$pdf->Cell(30,5,utf8_decode(trim($row['asociado_nacionalidad'])),'B',0);
	$pdf->Cell(22,5,utf8_decode('Estado Civil: '),0,0);
	$pdf->Cell(25,5,utf8_decode(trim($row['asociado_estadocivil'])),'B',0);
	$pdf->Cell(20,5,utf8_decode('Domicilio: '),0,0);
	$pdf->Cell(0,5,utf8_decode(trim($row['asociado_municipio'])),'B',1);
	$pdf->Cell(18,5,utf8_decode('Dirección: '),0,0);
	$pdf->Cell(0,5,utf8_decode(trim($row['asociado_direccion'])),'B',1);
	$pdf->Cell(30,5,utf8_decode('Profesión u Oficio: '),0,0);
	$pdf->Cell(60,5,utf8_decode(trim($row['asociado_profesionoficio'])),'B',0);
	$pdf->Cell(30,5,utf8_decode('Ingreso Mensual: '),0,0);
	$pdf->Cell(0,5,utf8_decode('$ '.trim($row['asociado_ingresomes'])),'B',1);
	$pdf->Cell(46,5,utf8_decode('Dependencia donde trabaja: '),0,0);
	$pdf->Cell(0,5,utf8_decode($institucion),'B',0);

	//Genera PDF
	$pdf->Output();
?>