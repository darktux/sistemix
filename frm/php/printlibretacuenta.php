<?php
	require_once("funciones.php"); 
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
	date_default_timezone_set('America/El_Salvador');
    $loc_es=setlocale(LC_TIME,'es_ES.UTF-8','es_Es','es');

	require 'vendor/autoload.php';
	use Mike42\Escpos\Printer;
	use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

	try {
	    $connector = null;
	    $connector = new WindowsPrintConnector("MP-COAGESALUD");
	    $printer = new Printer($connector);
	    $printer -> setFont(Printer::FONT_B);
	    $printer -> setJustification(Printer::JUSTIFY_RIGHT);
	    $i=0;

	    for($m=0;$m<$_POST['num'];$m++){
	    	$printer -> text("\n");
	    	$i++;
	    }

	    $rs=mysql_query("SELECT cuentamovimiento_fecha, cuentamovimiento_comprobante, cuentamovimiento_retiro, cuentamovimiento_deposito, cuentamovimiento_saldo, cuentamovimiento_id FROM tab_cuenta_movimiento WHERE cuentamovimiento_cuentaid='".$_POST['idcm']."' AND cuentamovimiento_impreso=0 AND cuentamovimiento_concepto not like 'Apertura de cuenta';");
	    

	    while($row = mysql_fetch_row($rs)) {
	    	$i++;
	    	if($i<=57){
		        $fecha = trim($row[0]);
		        $comprobante = trim($row[1]);
		        $cargo = trim($row[2]);
		        $abono = trim($row[3]);
		        $saldo = trim($row[4]);

		        if($i<10){$ii="0".$i;}else{$ii=$i;}

		        //$ii = str_pad($ii, 5, STR_PAD_LEFT);
		        $fecha = str_pad($fecha, 13, " ", STR_PAD_LEFT);
		        $comprobante = str_pad($comprobante, 18, " ", STR_PAD_LEFT);
		        $cargo = str_pad($cargo, 17, " ", STR_PAD_LEFT);
		        $abono = str_pad($abono, 17, " ", STR_PAD_LEFT);
		        $saldo = str_pad($saldo, 17, " ", STR_PAD_LEFT);

				$printer -> text( $ii.$fecha.$comprobante.$cargo.$abono.$saldo."\n");

				mysql_query("UPDATE tab_cuenta_movimiento SET cuentamovimiento_impreso=1 WHERE cuentamovimiento_id=".$row[5].";");
			}else{
				break 1;
			}

	    }
    
	    $printer -> feedForm();
	    /* Close printer */
	    $printer -> close();
	} catch (Exception $e) {
	    echo "No se puede imprimir en esta impresora, verifique si esta conectada y encendida: " . $e -> getMessage() . "\n";
	}



	
?>