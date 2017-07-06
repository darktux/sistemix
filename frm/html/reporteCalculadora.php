<?php 
	require("../../fpdf181/fpdf.php");
	require("../php/Conex.php");
	require_once("../php/funciones.php"); 
	include_once('../php/calc.php');
	$con= new Conex();
	$con->conectar();
    date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');
    $idc=$_GET['idc'];
    $mon=$_GET['mon'];
    $pla=$_GET['pla'];
    $int=$_GET['int'];
  //  $idm=$_GET['idm'];

    //Obtengo el correlativo del socio
   
    
    //$pdf2 = new PDF();
    $pdf = new PDF();
   // $pdf->SetMargins(20,10,20);
    $pdf->AliasNbPages();
    $pdf->AddPage();
   // $pdf->header('TABLA DE AMORTIZACIÓN DE CREDITOS');
    $pdf->SetFont('Arial','B',8);
    
   
    //$pdf->SetLineWidth(0);
   $con->consulta("
                    SELECT 
                       *
                    FROM 
                        tab_calculo
                   
                ");
                $resultadoaux = $con->getResultado();
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
                 
                    $salida[$i]=$fila;
                    $i++;
                }
   // $i=0;
  
   
  
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(150,5,utf8_decode("ASOCIADO:  ".$idc),0,0, 'L');
    $pdf->Ln();
    $pdf->Cell(50,5,utf8_decode("MONTO: $".$mon),0,0, 'L');
    $pdf->Cell(50,5,utf8_decode("PLAZO: ".$pla.' MESES'),0,0, 'L');
    $pdf->Cell(50,5,utf8_decode("INTERÉS: ".$int."%"),0,0, 'L');
    $pdf->Ln(6);
    $pdf->Cell(45,5,utf8_decode('Fecha || Cuota #'),1,0, 'C');
    $pdf->Cell(35,5,utf8_decode('Cuota Mensual ($)'),1,0, 'C');
    $pdf->Cell(35,5,utf8_decode('Amortización ($)'),1,0, 'C');
    $pdf->Cell(35,5,'Intereses ($)',1,0, 'C');
     $pdf->Cell(35,5,'Monto ($)',1,0, 'C');
    
    $pdf->Ln();

    for($x=0;$x<$i-1;$x++) {
       
       // $cuenta = ;
       // $asociado = trim($salida[$x]['calculos_id']);
       // $monto = trim($salida[$x]);
   
            $pdf->SetFont('Arial','',10);
           // $pdf->Cell(10,5,$x+1,1,0, 'C');
        	$pdf->Cell(45,5,$salida[$x]['calculos_id'],1,0, 'C');
            $pdf->Cell(35,5,$salida[$x]['calculos_cuota'],1,0, 'C');
            $pdf->Cell(35,5,$salida[$x]['calculos_amortizacion'],1,0, 'C');
            $pdf->Cell(35,5,$salida[$x]['calculos_intereses'],1,0, 'C');
            $pdf->Cell(35,5,$salida[$x]['calculos_monto'],1,0, 'C');
        	//$pdf->Cell(125,5,utf8_decode($asociado),1,0, 'J');
           // $pdf->Cell(30,5,utf8_decode($monto),1,0, 'C');
            $pdf->Ln();
            //$tmonto+=$monto;
        
    }
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(45,5,$salida[$x]['calculos_id'],1,0, 'C');
    $pdf->Cell(35,5,$salida[$x]['calculos_cuota'],1,0, 'C');
    $pdf->Cell(35,5,$salida[$x]['calculos_amortizacion'],1,0, 'C');
    $pdf->Cell(35,5,$salida[$x]['calculos_intereses'],1,0, 'C');
    $pdf->Cell(35,5,$salida[$x]['calculos_monto'],1,0, 'C');
    //$pdf->Cell(160,5,'Total de Aportaciones ($): ',1,0, 'R');
  //  $pdf->Cell(30,5,utf8_decode($tmonto),1,0, 'C');
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