<?php 
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");
	require_once("../php/funciones.php"); 
	include_once('../php/pdfAportacion.php');
	$con= new Conex();
	$con->conectar();
    date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');
    $idc=$_GET['idc'];
  //  $idm=$_GET['idm'];

    //Obtengo el correlativo del socio
    $v=split('-', $idc);
    $corr=$v[2];
    $tmonto=0;
    
    //$pdf2 = new PDF();
    $pdf = new PDF();
   // $pdf->SetMargins(20,10,20);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);
    
   
    //$pdf->SetLineWidth(0);
    $sql="SELECT cuentamovimiento_comprobante, cuentamovimiento_concepto,cuentamovimiento_fecha,cuentamovimiento_deposito,asociado_nombre FROM tab_cuenta_movimiento,tab_asociado WHERE cuentamovimiento_cuentaid='".$idc."' and asociado_correlativo='".$corr."'";
    $rs=mysql_query($sql);
    $i=0;


    while($row = mysql_fetch_row($rs)) {
        $i++;
        $comprobante = trim($row[0]);
        $concepto = trim($row[1]);
        $fecha = trim($row[2]);
        $monto = trim($row[3]);
        $nombre = trim($row[4]);
        if($i==1)
        {
            $pdf->Cell(0,0,'Asociado No.: '.$corr.'       ',0,1,'L'); 
           $pdf->Ln();
           
           $pdf->Cell(0,10,"Nombre Asociado: ".$nombre,0,1,'L');
         
           $pdf->Cell(0,0,'No. Cuenta: '.$idc,0,1,'L'); 
            $pdf->Ln(5);
             $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,5,utf8_decode('Nº'),1,0, 'C');
            $pdf->Cell(50,5,'FECHA',1,0, 'C');
            $pdf->Cell(50,5,utf8_decode('Nº COMPROBANTE'),1,0, 'C');
            $pdf->Cell(50,5,'CONCEPTO',1,0, 'C');
            $pdf->Cell(25,5,'MONTO ($)',1,0, 'C');
            $pdf->Ln();

        }
        else{
             
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,$i-1,1,0, 'C');
        	$pdf->Cell(50,5,utf8_decode(fechaesp($fecha)),1,0, 'C');
        	$pdf->Cell(50,5,utf8_decode($comprobante),1,0, 'C');
        	$pdf->Cell(50,5,utf8_decode(getConcepto($concepto)),1,0, 'C');
            $pdf->Cell(25,5,utf8_decode($monto),1,0, 'C');
            $pdf->Ln();
            $tmonto+=$monto;
        }
    }
     $pdf->SetFont('Arial','B',10);
    $pdf->Cell(165,5,'Total Aportado ($): ',1,0, 'R');
    $pdf->Cell(25,5,utf8_decode($tmonto),1,0, 'C');
   // Footer();
   // $pdf->SetY(-30);
        //Arial italic 8
   // $pdf->SetFont('Arial','I',8);
        //Número de página
   // $pdf->Footer();
	$pdf->Output();





    function fechaesp($date) {
        $dia = explode("-", $date, 3);
        $year = $dia[0];
        $month = (string)(int)$dia[1];
        $day = (string)(int)$dia[2];
        
        $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
        $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
     
        $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        
        return $day." de ".$meses[$month]." de ".$year;
    }


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