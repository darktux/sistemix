<?php
    date_default_timezone_set('America/El_Salvador');
    include_once('pdf.php');
    include_once('Conex.php');
    $con= new Conex();
    $con->conectar();

	$con->consulta("SELECT asociado_id, asociado_nombre, asociado_profesionoficio, asociado_fechanacimiento, asociado_dui, asociado_departamento, asociado_municipio  FROM tab_asociado where asociado_id='".$_GET['cod']."'");
    
    while ($row = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)){
		$cod_per= $row['asociado_id'];
		$nom= $row['asociado_nombre'];
		$profe= $row['asociado_profesionoficio'];
		$fec= $row['asociado_fechanacimiento'];
		$dui=$row['asociado_dui'];
		$depto=$row['asociado_departamento'];
		$muni=$row['asociado_municipio'];
    }

    $fecha=CalculaEdad( $fec );

    $html = '<b>La Asociacion Cooperativa de Ahorro y Credito de Empleados del Ministerio de Salud Region Paracentral de Responsabilidad Limitada</b>, que se abrevia <b>CO-AGESALUD DE R.L.</b>, con domicilio en Cojutepeque, departamento de Cuscatlan y <u>  '.$nom.'  </u>, de ocupacion <u>  '.$profe.'  </u>, de <u>  '.$fecha.'  </u> a;os de edad, con documento de identidad No. <u>  '.$dui.'  </u>, del domicilio de <u>  '.$muni.'  </u>, departamento de <u>  '.$depto.'  </u>, quienes en adelante de denominaran la Cooperativa y el Ahorrante, han convenido en celebrar el presente contrato, cuyas clausulas se detallan a continuacion: ';
    $html2='<br>1. Los retiros y depositos a la cuenta de ahorros, podran ser efectuados en agencias de la Cooperativa. <br>2. El (los) Ahorrante(s) designa(n) la(s) persona(s) autorizada(s) para retirar dinero de su cuenta, a las detalladas en el registro de firmas anexo a este contrato.<br>3. El(los) Ahorrante(s) designa(s) a los beneficiarios detallados en el registro de firmas anexo a este contrato y el porcentaje en que el saldo debera distribuirse, en caso que no existiere, se entendera que la distribucion sera por partes iguales entre los beneficiarios.<br>4. Los depositos de ahorro no tendran limite y se haran en cantidades que el(los) ahorrante(s) abonen a su cuenta y devengaran intereses del <b><u>2.50% anual</u></b>, capitalizables al 31 de marzo, 30 de junio, 30 de septiembre y 31 de diciembre de cada a;o.<br>5. La Cooperativa proporcionara al(los) ahorrante(s), libreta de ahorros, en la que se anotaran los depositos y retiros, asi como los intereses devengados, el ahorrante debera presentar la libreta cada vez que efectue operaciones de deposito y retiro de su cuenta de ahorros, con el fin de comprobar las operaciones y actualizaciones de su saldo.<br>6. Los depositos efectuados con cheque a cargo de bancos locales o extranjeros y giros, quedaran sujetos al periodo de compensacion correspondiente y en caso de rechazo dentro o fuera de este periodo, se cargara a la cuenta de ahorros, el valor del cheque o giro, mas los costos, gastos, comisiones e impuestos que esto haya ocasionado. <br>7. El(los) ahorrante(s) autoriza(n) a la Cooperativa, para que cargue en su cuenta de ahorros, las cantidades que le adeude(n), en concepto de intereses, prestamos, asi como tambien por cualquier clase de deudas y servicios que tuviese(n) pendiente de pago con la Cooperativa, mientras dure este contrato.<br>8. La Cooperativa, podra cerrar la cuenta de ahorros en cualquier momento, por decision del Consejo de Administracion, avisando por escrito al ahorrante, abandonandole los intereses a la fecha de la clausura y deduciendo los saldos por deudas o servicios que estuviesen pendientes.'; 
    if(strcmp($_GET['tipo_cuenta'], 'AHORRO NAVIDEÑO') == 0){
        $html3='<br>9. Los menores de edad que hayan cumplido 16 años de edad podrán abrir cuentas de ahorros, efectuar depósitos y los retiros de su cuenta solo durante el mes de diciembre de cada año, condición especial de <b>AHORRO NAVIDEÑO</b>, libremente';
    }else
    {
       $html3=utf8_encode('<br>9. Los menores de edad que hayan cumplido 16 años de edad podrán abrir cuentas de ahorros, efectuar depósitos y los retiros de su cuenta libremente'); 
    }
    
    $html4='<br>10. En caso de destruccion ';

     //Se crea un objeto de PDF
    //Para hacer uso de los métodos
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter');
    
    $pdf->SetFont('Arial','B',8);
     $pdf->Cell(0,-15,$_GET['tipo_cuenta'],0,1,'C'); 
   // $pdf->Ln(0.5);
    $pdf->Cell(0,25,'No. Cuenta:           '.$_GET['cuenta'].'                     ',0,1,'R'); 
   // $pdf->Ln(0.5);
    $pdf->Cell(0,-25,'________________',0,1,'R'); 
    $pdf->Cell(0,40,'Asociado No.:       0'.$cod_per.'       ',0,1,'R'); 
   // $pdf->Ln(0.5);
    $pdf->Cell(0,-40,'________',0,1,'R'); 
 	$pdf->Ln(40);
 	$pdf->SetLeftMargin(10);
	$pdf->SetFontSize(8);
	$pdf->WriteHTML($html);
	$pdf->SetFontSize(6.5);
	$pdf->WriteHTML($html2);
    $pdf->WriteHTML($html3);
 	

 
 

   
    $pdf->Output(); //Salida al navegador del 


 function CalculaEdad( $fecha ) {
        list($Y,$m,$d) = explode("-",$fecha);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
?>
