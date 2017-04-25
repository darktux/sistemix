<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_capital';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS****************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $con->consulta("INSERT INTO 
                ".$nombretabla."(
                    capital_anio,
                    capital_fecha,
                    capital_concepto,
                    capital_deposito,
                    capital_retiro,
                    capital_saldo,
                    capital_sucursalid
                ) 
                VALUES(
                    ".$_POST['ani'].",
                    '".$_POST['fec']."',
                    '".$_POST['con']."',
                    ".$_POST['dep'].",
                    ".$_POST['ret'].",
                    ".$_POST['sal'].",
                    1
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
                ORDER BY 
                    capital_id 
                DESC;
            ");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $i++;
            }
            echo json_encode($salida);
            break;
        case 'getSaldoCapital':
            $con->consulta("
                SELECT 
                    capital_saldo 
                FROM 
                    ".$nombretabla." 
                ORDER BY 
                    capital_id 
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
            case 'calc':
                $i=0;
                $salida=array();
                $fila=array();
                $tiempo=$_POST['tiempo'];
                $monto=$_POST['monto'];
                $interes=($_POST['interes']/12)/100;
               
                $constante=pow((1+$interes),$tiempo);
                $arriba=$constante*$interes;
                $abajo=$constante-1;
                $cuota=round((($monto)*($arriba/$abajo)),2);
                $con->consulta("DELETE FROM tab_calculo");

                for($i=0;$i<$tiempo;$i++) {       
                   
                    if($cuota>$monto){
                        $cuota=$monto+round($monto*$interes,2);
                    }
                    
                    $amortizacion=round(($cuota-($monto*$interes)),2);
                    $inter=round($monto*$interes,2);
                    $monto=round($monto-$amortizacion,2);


                    $fila[0]=$cuota;
                    $fila[1]=$amortizacion;
                    $fila[2]=$inter;
                    $fila[3]=$monto;
                     $con->consulta("INSERT INTO 
                                tab_calculo (
                                calculos_cuota,
                                calculos_amortizacion,
                                calculos_intereses,
                                calculos_monto
                            ) 
                            VALUES(
                                ".$cuota.",
                                ".$amortizacion.",
                                ".$inter.",
                                ".$monto."
                                );
                        ");
                   // $salida[$i]=$fila;
                    //$i++;
                }
                //echo json_encode($salida);
            break; 
            case 'calcs':
            $con->consulta("
                SELECT 
                    * 
                FROM 
                    tab_calculo
            ");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $i++;
            }
            echo json_encode($salida);
            break;         
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>