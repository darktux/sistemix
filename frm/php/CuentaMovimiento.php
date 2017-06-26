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
        case 'setAportacion':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $cuotas=$_POST['con'];
            $numCuotas=count($cuotas);
            $saldoAnterior=$_POST['sal0'];
            $saldoNuevo=$_POST['sal'];
            $diferencia=$saldoNuevo-$saldoAnterior;
            $repartido=$diferencia/$numCuotas;
            for ($i=0; $i < $numCuotas; $i++) { 
                $saldoAnterior=$saldoAnterior+$_POST['dep'];
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
                        cuentamovimiento_comprobante,
                        cuentamovimiento_concepto,
                        cuentamovimiento_fecha,
                        cuentamovimiento_deposito,
                        cuentamovimiento_retiro,
                        cuentamovimiento_saldo,
                        cuentamovimiento_cuentaid
                    ) 
                    VALUES(
                        '".$_POST['compro']."',
                        '".$cuotas[$i]."',
                        '".$_POST['fec']."',
                        ".$_POST['dep'].",
                        ".$_POST['ret'].",
                        ".$saldoAnterior.",
                        '".$_POST['idcue']."'
                    );
                ");
            }
            
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            break;

        case 'getUltimaCuotaPagada':
            $sql="SELECT cuentamovimiento_concepto, cuentamovimiento_fecha FROM tab_cuenta_movimiento WHERE cuentamovimiento_cuentaid='".$_POST['idcue']."' and cuentamovimiento_concepto NOT LIKE 'Volun%' ORDER BY cuentamovimiento_id DESC";
            $rs=mysql_query($sql);
            if($row=mysql_fetch_array($rs)){
                echo $row[0].'/'.$row[1];
            }
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
            case 'edi':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************/
            $con->consulta("
                UPDATE 
                    ".$nombretabla." 
                SET 
                    cuentamovimiento_fecha='".$_POST['fec']."',
                    cuentamovimiento_comprobante='".$_POST['compro']."',
                    cuentamovimiento_deposito=".$_POST['dep'].",
                    cuentamovimiento_saldo=".$_POST['sal']."
                WHERE 
                    cuentamovimiento_id=".$_POST['id'].";
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************/
            if($con->getResultado()){
               
                 $con->consulta("select cuentamovimiento_id, cuentamovimiento_deposito, cuentamovimiento_saldo from tab_cuenta_movimiento where cuentamovimiento_cuentaid in (select cuentamovimiento_cuentaid from tab_cuenta_movimiento where cuentamovimiento_id=".$_POST['id'].") and cuentamovimiento_saldo > 0 ORDER by cuentamovimiento_id ASC");
                 $i=0;
                 $salida=array();
                while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                        $salida[$i]=$fila;
                        $i++;
                    }

                for($x=1;$x<$i;$x++){
                    $sal=floatval($salida[$x]['cuentamovimiento_deposito'])+floatval($salida[$x-1]['cuentamovimiento_saldo']);
                    $salida[$x]['cuentamovimiento_saldo']=$sal;
                   // echo $sal;
                     $con->consulta("
                        UPDATE 
                            ".$nombretabla." 
                        SET 
                            cuentamovimiento_saldo=".$sal."
                            
                        WHERE 
                            cuentamovimiento_id=".floatval($salida[$x]['cuentamovimiento_id']).";
                    ");
                     $con->getResultado();
                }

                 echo "Registro modificado.";
            }else{echo "Error al modificar.";}
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
                    cuentamovimiento_cuentaid='".$_POST['idcue']."' and cuentamovimiento_concepto <> 'Apertura de cuenta'
                ORDER BY 
                    cuentamovimiento_id 
                DESC;
            ");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $fechaConcepto=$salida[$i]['cuentamovimiento_concepto'];
                $salida[$i]['cuentamovimiento_concepto']=getConcepto($fechaConcepto);
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

        case 'getMontoAportacion':
            $con->consulta("
                SELECT 
                    tipocuenta_cobromontominimo 
                FROM 
                    tab_tipo_cuenta 
                WHERE
                    tipocuenta_correlativo='01' 
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