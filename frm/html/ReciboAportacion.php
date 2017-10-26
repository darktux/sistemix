<?php 
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");
	require_once("../php/funciones.php"); 
	
	$con= new Conex();
	$con->conectar();
    date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');
    $idc=$_GET['idc'];
    $idm=$_GET['idm'];

    //Obtengo el correlativo del socio
    $v=split('-', $idc);
    $corr=$v[2];

    $sql="SELECT cuentamovimiento_concepto,cuentamovimiento_fecha,cuentamovimiento_deposito,asociado_nombre FROM tab_cuenta_movimiento,tab_asociado WHERE cuentamovimiento_id='".$idm."' and asociado_correlativo='".$corr."'";
    $rs=mysql_query($sql);
    if ($row = mysql_fetch_row($rs)) {
    	$concepto = trim($row[0]);
    	$fecha = trim($row[1]);
    	$monto = trim($row[2]);
    	$nombre = trim($row[3]);
    }


    $pdf = new FPDF('P','mm','recibo');
	$pdf->SetMargins(1,1,1);
	$pdf->AddPage();
	$pdf->SetFont('Courier','B',12);

	$pdf->setXY(30,60);
	$pdf->Cell(46,5,utf8_decode($fecha),0,0);
	$pdf->setXY(30,70);
	$pdf->Cell(46,5,utf8_decode(getConcepto($nombre)),0,0);
	$pdf->setXY(85,100);
	$pdf->Cell(46,5,utf8_decode($monto),0,0);
	$pdf->setXY(85,130);
	$pdf->Cell(46,5,utf8_decode($monto),0,0);
	$pdf->setXY(50,140);
	$pdf->Cell(46,5,utf8_decode(getConcepto($concepto)),0,0);

	$pdf->Output();












	function getConcepto($fechaConcepto){
        $vector=split('-', $fechaConcepto);
        $mes=$vector[1];
        switch ($mes) {
            case '01':
                $mes='Enero/'.$vector[0];
                break;
            case '02':
                $mes='Febrero/'.$vector[0];
                break;
            case '03':
                $mes='Marzo/'.$vector[0];
                break;
            case '04':
                $mes='Abril/'.$vector[0];
                break;
            case '05':
                $mes='Mayo/'.$vector[0];
                break;
            case '06':
                $mes='Junio/'.$vector[0];
                break;
            case '07':
                $mes='Julio/'.$vector[0];
                break;
            case '08':
                $mes='Agosto/'.$vector[0];
                break;
            case '09':
                $mes='Septiembre/'.$vector[0];
                break;
            case '10':
                $mes='Octubre/'.$vector[0];
                break;
            case '11':
                $mes='Noviembre/'.$vector[0];
                break;
            case '12':
                $mes='Diciembre/'.$vector[0];
                break;
            
            default:
                $mes=$fechaConcepto;
                break;
        }
            
        return $mes;
    }
?>
?>