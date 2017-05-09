<?php  
require('Conex.php');
//require('Console.php');
	$con= new Conex();
	$con->conectar();
	date_default_timezone_set('AMERICA/EL_SALVADOR');
	if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}

	switch ($_POST['acc']) {
		case 'getjsontabla':
			$sql='SELECT asociado_id,asociado_nombre,asociado_dui,cuentamovimiento_fecha, MAX(str_to_date(cuentamovimiento_concepto,"%Y-%m-%d")) as ultima_fechapagada,asociado_numpunto as numcuotas
					FROM tab_asociado,tab_cuenta_movimiento,tab_cuenta 
					WHERE asociado_id=cuenta_asociadoid 
						and cuentamovimiento_cuentaid=cuenta_id 
						and asociado_estado="Activo"
                        GROUP BY asociado_nombre';
			$con->consulta($sql);
			$i=0;
			$salida=array();
			$morosos=array();
			$fechaHoy=date('Y-m-d');
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {
                $salida[$i]=$fila;
				if($salida[$i]['ultima_fechapagada']<$fechaHoy){
					if($salida[$i]['ultima_fechapagada']==NULL){
						$salida[$i]['ultima_fechapagada']="Apertura de cuenta";
						$fechaPagada= $salida[$i]['cuentamovimiento_fecha'];
					}else{
						//Obtengo el numero de cuotas que no ha pagado
						$fechaPagada= $salida[$i]['ultima_fechapagada'];
						
					}
					$fechaPagada= split("-", $fechaPagada);
					$jaja=intval($fechaPagada[1]);
					$fechaActual= strtotime($fechaHoy);
					$diferencia = strtotime('-'.intval($fechaPagada[1]).'month',$fechaActual);
					$diferencia = date('Y-m-d',$diferencia);
					$diferencia = split('-', $diferencia);
					$salida[$i]['numcuotas']=$diferencia[1];
					$morosos[$i]=$salida[$i];
					$morosos[$i]['numcuotas']=date('Y-m-d',$fechaActual);
				}
                $i++;
            }
            echo json_encode($morosos);
			break;
	}
?>