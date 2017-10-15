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
	    $printer -> setJustification(Printer::JUSTIFY_LEFT);
	    $i=0;

	    for($m=0;$m<$_POST['num'];$m++){
	    	$printer -> text("\n");
	    	$i++;
	    }
		//echo $_POST['idcm'];
	    $rs=mysql_query("SELECT a.asociado_nombre, a.asociado_correlativo, a.asociado_direccion, a.asociado_municipio, a.asociado_departamento, a.asociado_dui, a.asociado_nit, c.cuenta_fechaapertura, t.tipocuenta_nombre FROM tab_asociado a, tab_cuenta c, tab_tipo_cuenta t WHERE cuenta_id='".$_POST['idcm']."' AND c.cuenta_asociadoid=a.asociado_id AND t.tipocuenta_id=c.cuenta_tipocuentaid; ");
	    

	    while($row = mysql_fetch_row($rs)) {
	    	
	        $nombre = trim($row[0]);
	        $correlativo = trim($row[1]);
	        $direccion = trim($row[2]);
	        $municipio = trim($row[3]);
	        $departamento = trim($row[4]);
	        $dui = trim($row[5]);
	        $nit = trim($row[6]);
	        $fechaapertura = trim($row[7]);
	        $tipocuenta = trim($row[8]);


	        $direccion=$direccion.", ".$municipio.", ".$departamento;

	        //echo substr($direccion, 0, 80); 
	        //echo substr($direccion, 80);

	        //$ii = str_pad($ii, 5, STR_PAD_LEFT);
	        $nombre = str_pad($nombre, 50, " ", STR_PAD_RIGHT);
	        $correlativo = str_pad($correlativo, 5, " ", STR_PAD_RIGHT);
	        $direccion = str_pad($direccion, 160, " ", STR_PAD_RIGHT);
	        $dui = str_pad($dui, 50, " ", STR_PAD_RIGHT);
	        $fechaapertura = str_pad($fechaapertura, 15, " ", STR_PAD_RIGHT);


	        $printer -> text("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n"); //////Ajustar pleca n aqui**********************************************************************
			$printer -> text(
				//"      Tipo de cuenta: ".$tipocuenta."      No. Cuenta: ".$_POST['idcm']."\n      ".
				$nombre.
				$correlativo.
				"\n\n\n            ".
				substr($direccion, 0, 70).
				"\n            ".
				substr($direccion, 70).
				"\n         ".
				$dui.
				"        ".
				$fechaapertura.
				"\n"
			);
	        // echo $nombre.$correlativo.$direccion.$dui.$fechaapertura;
	    }
    
	    $printer -> feedForm();
	    /* Close printer */
	    $printer -> close();
	} catch (Exception $e) {
	    echo "No se puede imprimir en esta impresora, verifique si esta conectada y encendida: " . $e -> getMessage() . "\n";
	}



	
?>