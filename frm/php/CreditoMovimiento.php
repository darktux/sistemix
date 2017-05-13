<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_credito_movimiento';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS****************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
    if(isset($_GET['idcre'])){$_POST['idcre']=$_GET['idcre'];}
    date_default_timezone_set('AMERICA/EL_SALVADOR');
	switch ($_POST['acc']) {
		case 'set':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $con->consulta("COMMIT");
            try{ 
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
                        creditomovimiento_concepto,
                        creditomovimiento_fecha,
                        creditomovimiento_deposito,
                        creditomovimiento_retiro,
                        creditomovimiento_interes,
                        creditomovimiento_capital,
                        creditomovimiento_saldo,
                        creditomovimiento_creditoid,
                        creditomovimiento_sigfechapago
                    ) 
                    VALUES(
                        '".$_POST['con']."',
                        '".$_POST['fec']."',
                        ".$_POST['mon'].",
                        0.00,
                        ".$_POST['int'].",
                        ".$_POST['cap'].",
                        ".$_POST['sal'].",
                        ".$_POST['idcre'].",
                        DATE_ADD('".$_POST['fechaactu']."',INTERVAL 30 DAY)
                    );
                ");
                $saldo_capital=0.00;
                $con->consulta("
                    SELECT 
                        capital_saldo     
                    FROM 
                        tab_capital
                    ORDER BY 
                        capital_id 
                    DESC 
                    LIMIT 
                        1;
                ");
                if ($fila = mysql_fetch_row($con->getResultado())) {       
                    $saldo_capital = $fila[0];
                }
                $con->consulta("INSERT INTO 
                    tab_capital(
                        capital_anio,
                        capital_fecha,
                        capital_concepto,
                        capital_deposito,
                        capital_retiro,
                        capital_saldo,
                        capital_sucursalid
                    ) 
                    VALUES(
                        '".date("Y")."',
                        '".date("Y-m-d")."',
                        'Pago de capital prestamo # ".$_POST['idcre']."',
                        ".$_POST['cap'].",
                        0.00,
                        ".($saldo_capital+$_POST['cap']).",
                        '1'
                    );
                ");
                if(($_POST['int']+0.0)>0.00){
                    $con->consulta("INSERT INTO 
                        tab_capital(
                            capital_anio,
                            capital_fecha,
                            capital_concepto,
                            capital_deposito,
                            capital_retiro,
                            capital_saldo,
                            capital_sucursalid
                        ) 
                        VALUES(
                            '".date("Y")."',
                            '".date("Y-m-d")."',
                            'Pago de interes prestamo # ".$_POST['idcre']."',
                            ".$_POST['int'].",
                            0.00,
                            ".($saldo_capital+$_POST['int']+$_POST['cap']).",
                            '1'
                        );
                    ");
                }
                $con->consulta('COMMIT');
            }catch(Exception $e){
                $con->consulta('ROLLBACK');
                echo 'Error al guardar: ',$e->getMessage(),"\n";
            }
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
                    creditomovimiento_creditoid='".$_POST['idcre']."'
                ORDER BY 
                    creditomovimiento_id 
                DESC;
            ");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $i++;
            }
            echo json_encode($salida);
            break;
        case 'getSaldoCredito':
            $con->consulta("
                SELECT 
                    creditomovimiento_saldo 
                FROM 
                    ".$nombretabla." 
                WHERE
                    creditomovimiento_creditoid='".$_POST['idcre']."'
                ORDER BY 
                    creditomovimiento_id 
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