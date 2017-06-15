<?php 
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");
	require_once("../php/funciones.php"); 
	include_once('../php/ingreso.php');
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
   $con->consulta("
                    SELECT 
                        c.*,
                        a.asociado_nombre AS cuenta_asociadonombre,
                        t.tipocuenta_nombre AS cuenta_tipocuentanombre,
                        c.cuenta_id AS cuenta_saldo,
                        c.cuenta_id AS auxiliar
                    FROM 
                        tab_cuenta c,
                        tab_asociado a,
                        tab_tipo_cuenta t
                    WHERE
                        c.cuenta_asociadoid=a.asociado_id
                    AND
                        c.cuenta_tipocuentaid=t.tipocuenta_id
                    AND
                        t.tipocuenta_nombre='APORTACIONES' 
                    ORDER BY c.cuenta_id;
                ");
                $resultadoaux = $con->getResultado();
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
                    $con->consulta("
                        SELECT 
                            cuentamovimiento_deposito, cuentamovimiento_comprobante
                        FROM 
                            tab_cuenta_movimiento 
                        WHERE
                            cuentamovimiento_cuentaid='".$fila['cuenta_id']."'
                        AND
                            cuentamovimiento_concepto='Apertura de cuenta'
                       ;
                    ");
                    if ($fila2 = mysql_fetch_row($con->getResultado())) {       
                        $fila['cuenta_saldo']=$fila2[0];
                        $fila['auxiliar']=$fila2[1];
                    }
                    else{
                        $fila['cuenta_saldo']='0.00';
                    }
                    $salida[$i]=$fila;
                    $i++;
                }
   // $i=0;

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,5,utf8_decode('Nº'),1,0, 'C');
    $pdf->Cell(20,5,utf8_decode('Nº CUENTA'),1,0, 'C');
    $pdf->Cell(100,5,utf8_decode('ASOCIADO'),1,0, 'C');
    $pdf->Cell(35,5,utf8_decode('Nº COMPROBANTE'),1,0, 'C');
    $pdf->Cell(25,5,'CUOTA ($)',1,0, 'C');
    
    $pdf->Ln();

    for($x=0;$x<$i;$x++) {
       
        $cuenta = trim($salida[$x]['cuenta_id']);
        $asociado = trim($salida[$x]['cuenta_asociadonombre']);
        $monto = trim($salida[$x]['cuenta_saldo']);
        $compro = trim($salida[$x]['auxiliar']);
   
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(10,5,$x+1,1,0, 'C');
        	$pdf->Cell(20,5,utf8_decode($cuenta),1,0, 'C');
        	$pdf->Cell(100,5,utf8_decode($asociado),1,0, 'J');
            $pdf->Cell(35,5,utf8_decode($compro),1,0, 'C');
            $pdf->Cell(25,5,utf8_decode($monto),1,0, 'C');
            $pdf->Ln();
            $tmonto+=$monto;
        
    }
     $pdf->SetFont('Arial','B',9);
    $pdf->Cell(165,5,'TOTAL DE CUOTAS DE INGRESO ($): ',1,0, 'R');
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
