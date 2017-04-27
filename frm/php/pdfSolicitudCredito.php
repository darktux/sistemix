<?php
    date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');
    include_once('pdf.php');
    include_once('Conex.php');
    $con= new Conex();
    $con->conectar();

	$con->consulta("SELECT c.asociado_correlativo, c.asociado_nombre, c.asociado_profesionoficio, c.asociado_fechanacimiento, c.asociado_dui, c.asociado_departamento, c.asociado_municipio, a.tipocuenta_nombre FROM tab_tipo_cuenta a, tab_cuenta b, tab_asociado c where a.tipocuenta_id=b.cuenta_tipocuentaid and b.cuenta_asociadoid=c.asociado_id and c.asociado_nombre='".$_GET['id']."'");
    
    while ($row = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)){
		$cod_per= $row['asociado_correlativo'];
		$nom= $row['asociado_nombre'];
		$profe= $row['asociado_profesionoficio'];
		$fec= $row['asociado_fechanacimiento'];
		$dui=$row['asociado_dui'];
		$depto=$row['asociado_departamento'];
		$muni=$row['asociado_municipio'];
        $nomcta=$row['tipocuenta_nombre'];
    }

    $fecha=CalculaEdad($fec);

   

     //Se crea un objeto de PDF
    //Para hacer uso de los métodos
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter');
    
    $pdf->SetFont('Arial','B',8);
     
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',8);
 	$pdf->Cell(0,0,'FIRMAS CONTRATANTES',0,1,'C'); 
    $pdf->Cell(0,30,'F.________________________________',0,1,'L'); 
    $pdf->Cell(0,-18,'           AUTORIZADO (Cooperativa)',0,1,'L'); 
    $pdf->Cell(160,6,'F.________________________________',0,1,'R'); 
    $pdf->Cell(160,5,'AHORRANTE ASOCIADO           ',0,1,'R'); 
    $pdf->Cell(160,25,'F.________________________________',0,1,'R'); 
    $pdf->Cell(160,-12,'AHORRANTE AUTORIZADO       ',0,1,'R');
    $pdf->SetFont('Arial','',6.5);
    $pdf->Cell(0,-9    ,utf8_decode('Autorización en la cuenta '),0,1,'L'); 
    $pdf->Cell(0,15,'Nombre de la persona autorizada para tocar los fondos en esta',0,1,'L');
    $pdf->Cell(0,0,'cuenta:_______________________________________________________',0,1,'L');
    $pdf->Cell(0,10,'#DUI:',0,1,'L');
    $pdf->Cell(90,-10,'#NIT:',0,1,'C');
    $pdf->Cell(45,10,'________________________',0,1,'C');
    $pdf->Cell(126,-10,' ________________________',0,1,'C');
    $pdf->Cell(0,18,'Agencia: COJUTEPEQUE',0,1,'L');
    setlocale(LC_ALL, 'es_SV').': ';
    $pdf->Cell(0,-10,'LUGAR Y FECHA: Cojutepeque, '.iconv('ISO-8859-1', 'UTF-8', strftime('%A %d de %B de %Y', time())),0,1,'L');
   
    
   
    $pdf->Output(); //Salida al navegador del 


 function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
?>
