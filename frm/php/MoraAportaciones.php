<?php  
require('Conex.php');
//require('Console.php');
	$con= new Conex();
	$con->conectar();
	date_default_timezone_set('AMERICA/EL_SALVADOR');
	if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}

	switch ($_POST['acc']) {
		case 'getjsontabla':
			$sql='SELECT asociado_correlativo,asociado_nombre,asociado_dui, asociado_fechasesion as Mora from tab_asociado';
			$con->consulta($sql);
			$i=0;
			$salida=array();
			$morosos=array();
			$mora=array();
			//$fechaHoy=date('Y-m-d');
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {
                $salida[$i]=$fila;
				$con2= new Conex();
				$con2->conectar();
				$sql2="
					SELECT DATEDIFF(CURRENT_DATE(),(select MAX(cuentamovimiento_concepto) FROM tab_cuenta_movimiento WHERE cuentamovimiento_cuentaid LIKE '01-01-".$salida[$i]['asociado_correlativo']."' AND cuentamovimiento_concepto NOT LIKE 'A%' AND cuentamovimiento_concepto NOT LIKE 'V%' ORDER BY cuentamovimiento_fecha DESC)) as mora
				";
				$con2->consulta($sql2);
				  while ($fila2 = mysql_fetch_array($con2->getResultado(), MYSQL_ASSOC)) {
				  		
				  		if($fila2['mora']!=""||$fila2['mora']!=NULL)
				  		{
				  			$mora=$fila2['mora'];
				  		}	
				  		else
				  		{
				  			$con3= new Conex();
							$con3->conectar();
							$sql3="
								SELECT DATEDIFF(CURRENT_DATE(),(select cuentamovimiento_fecha FROM tab_cuenta_movimiento WHERE cuentamovimiento_cuentaid LIKE '01-01-".$salida[$i]['asociado_correlativo']."' AND cuentamovimiento_concepto LIKE 'A%' AND cuentamovimiento_concepto NOT LIKE 'V%' ORDER BY cuentamovimiento_fecha DESC)) as mora
							";
							$con3->consulta($sql3);
							while ($fila3 = mysql_fetch_array($con3->getResultado(), MYSQL_ASSOC)) {

								$mora=$fila3['mora'];
							  }
							  		
						}
				  }
							
				$salida[$i]['Mora']=$mora;
				$morosos[$i]=$salida[$i];
					//$morosos[$i]['numcuotas']=date('Y-m-d',$fechaActual);
				$i++;
            }
            echo json_encode($morosos);
			break;
	}
?>