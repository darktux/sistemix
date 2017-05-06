<?php  
require('Conex.php');
//require('Console.php');
	$con= new Conex();
	$con->conectar();
	date_default_timezone_set('AMERICA/EL_SALVADOR');
	if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}

	switch ($_POST['acc']) {
		case 'getjsontabla':
			$sql='SELECT asociado_id,asociado_nombre,asociado_dui,asociado_nit,creditomovimiento_sigfechapago FROM tab_asociado,tab_credito_movimiento,tab_solicitud_credito, tab_credito WHERE asociado_id=solicitudcredito_asociadoid and solicitudcredito_id=credito_solicitudcreditoid and credito_id=creditomovimiento_creditoid and credito_estado="Activo" and creditomovimiento_sigfechapago<now()';
			$con->consulta($sql);
			$i=0;
			$salida=array();
			$fechaActual=date('Y-m-d');
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {
                $salida[$i]=$fila;
				







                $i++;
            }
            echo json_encode($salida);
            //$fechaActual->format('Y-m-d');
			//echo Console::log('un_nombre', $sql);
            // $fechaPago=explode('-', $salida[$i]['credito_fechapago']);
            // $dia=$fechaPago[2];
			break;
	}
?>