<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_cuenta_movimiento';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS****************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
    if(isset($_GET['idcue'])){$_POST['idcue']=$_GET['idcue'];}
	switch ($_POST['acc']) {
		case 'set':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $con->consulta("INSERT INTO 
                ".$nombretabla."(
                    cuentamovimiento_concepto,
                    cuentamovimiento_fecha,
                    cuentamovimiento_deposito,
                    cuentamovimiento_retiro,
                    cuentamovimiento_saldo,
                    cuentamovimiento_cuentaid
                ) 
                VALUES(
                    '".$_POST['con']."',
                    '".$_POST['fec']."',
                    ".$_POST['dep'].",
                    ".$_POST['ret'].",
                    ".$_POST['sal'].",
                    '".$_POST['idcue']."'
                );
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            break;
    	case 'upd':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $con->consulta("
                UPDATE 
                    ".$nombretabla." 
                SET 
                    capital_anio='".$_POST['cor']."',
                    capital_fecha='".$_POST['fec']."',
                    capital_concepto=".$_POST['con'].",
                    capital_deposito=".$_POST['dep'].",
                    capital_retiro=".$_POST['ret'].",
                    capital_saldo=".$_POST['sal']."
                WHERE 
                    capital_id=".$_POST['id'].";
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************/
			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************/
            $con->consulta("
                DELETE FROM 
                    ".$nombretabla." 
                WHERE 
                    capital_id='".$_POST['id']."';
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************/
            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;
		case 'getjsontabla':
            $con->consulta("
                SELECT 
                    * 
                FROM 
                    ".$nombretabla."
                WHERE
                    cuentamovimiento_cuentaid='".$_POST['idcue']."'
                ORDER BY 
                    cuentamovimiento_id 
                DESC;
            ");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $i++;
            }
            echo json_encode($salida);
            break;
        case 'getSaldoCuenta':
            $con->consulta("
                SELECT 
                    cuentamovimiento_saldo 
                FROM 
                    ".$nombretabla." 
                WHERE
                    cuentamovimiento_cuentaid='".$_POST['idcue']."'
                ORDER BY 
                    cuentamovimiento_id 
                DESC 
                LIMIT 
                    1;
            ");
            if ($fila = mysql_fetch_row($con->getResultado())) {       
                echo $fila[0];
            }
            else{
                echo '0.00';
            }
            break;           
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>