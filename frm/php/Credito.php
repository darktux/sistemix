<?php
	date_default_timezone_set('America/El_Salvador');
    require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_credito';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("BEGIN");
                try{
                    $con->consulta("INSERT INTO 
                        ".$nombretabla."(
                            cuenta_id,
                            cuenta_fechaapertura,
                            cuenta_estado,
                            cuenta_asociadoid,
                            cuenta_tipocuentaid

                        ) 
                        VALUES(
                            '".$_POST['cueid']."',
                            '".$_POST['fecape']."',
                            '".$_POST['est']."',
                            ".$_POST['asoid'].",
                            ".$_POST['tipcueid']."
                        );
                    ");
                    
                    $con->consulta("INSERT INTO 
                        tab_cuenta_movimiento(
                            cuentamovimiento_concepto,
                            cuentamovimiento_fecha,
                            cuentamovimiento_deposito,
                            cuentamovimiento_retiro,
                            cuentamovimiento_saldo,
                            cuentamovimiento_cuentaid
                        ) 
                        VALUES(
                            'Apertura de cuenta',
                            '".date("Y-m-d")."',
                            '".$_POST['mon']."',
                            0.00,
                            '".$_POST['mon']."',
                            '".$_POST['cueid']."'
                        );
                    ");

                    //Ingreso los autorizados de la cuenta
                    for ($i=1; $i < 4; $i++) { 
                        if( strcmp( $_POST['nom'.$i] ,"")!=0 ){
                            $sql2="
                            INSERT INTO 
                                tab_cuenta_autorizados(
                                    cuentaautorizados_cuentaid,
                                    cuentaautorizados_nombre,
                                    cuentaautorizados_dui,
                                    cuentaautorizados_nit
                                )
                            VALUES(
                                '".$_POST['cueid']."',
                                '".$_POST['nom'.$i]."',
                                '".$_POST['dui'.$i]."',
                                '".$_POST['nit'.$i]."'
                            )";
                            $con->consulta($sql2);
                        }
                    }
                    $con->consulta("COMMIT");
                }catch(Exception $e){
                    $con->consulta('ROLLBACK');
                    echo 'Error al guardar: ',$e->getMessage(),"\n";
                }
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;
    	case 'upd':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("BEGIN");
            try{
                $con->consulta("
                    UPDATE 
                        ".$nombretabla." 
                    SET 
                        cuenta_fechaapertura='".$_POST['fecape']."',
                        cuenta_tipocuentaid=".$_POST['tipcueid'].",
                        cuenta_estado='".$_POST['est']."'
                    WHERE 
                        cuenta_id=".$_POST['id'].";
                ");
                //Actualiza los autorizados de la cuenta
                $con->consulta("DELETE FROM tab_cuenta_autorizados WHERE cuentaautorizados_cuentaid='".$_POST['cueid']."'");
                for ($i=1; $i < 4; $i++) { 
                    if( strcmp( $_POST['nom'.$i] ,"")!=0 ){
                        $sql2="
                        INSERT INTO 
                            tab_cuenta_autorizados(
                                cuentaautorizados_cuentaid,
                                cuentaautorizados_nombre,
                                cuentaautorizados_dui,
                                cuentaautorizados_nit
                            )
                        VALUES(
                            '".$_POST['cueid']."',
                            '".$_POST['nom'.$i]."',
                            '".$_POST['dui'.$i]."',
                            '".$_POST['nit'.$i]."'
                        )";
                        $con->consulta($sql2);
                    }
                }
                $con->consulta("COMMIT");
            }catch(Exception $e){
                $con->consulta('ROLLBACK');
                echo 'Error al guardar: ',$e->getMessage(),"\n";
            }
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':
        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("
                DELETE FROM 
                    ".$nombretabla." 
                WHERE 
                    credito_id='".$_POST['id']."';
            ");
        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;       

		case 'getjsontabla':
                $con->consulta("
                    SELECT 
                        c.*,
                        a.asociado_nombre AS credito_asociadonombre,
                        a.asociado_dui AS credito_asociadodui,
                        t.tipocredito_nombre AS credito_tipocreditonombre,
                        c.credito_id AS credito_saldo,
                        c.credito_id AS credito_sigfechapago
                    FROM 
                        ".$nombretabla." c,
                        tab_solicitud_credito s,
                        tab_asociado a,
                        tab_tipo_credito t
                    WHERE
                        c.credito_solicitudcreditoid=s.solicitudcredito_id
                    AND
                        s.solicitudcredito_asociadoid=a.asociado_id
                    AND
                        c.credito_tipocreditoid=t.tipocredito_id;
                ");
                $resultadoaux = $con->getResultado();
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
                    $con->consulta("
                        SELECT 
                            creditomovimiento_saldo,creditomovimiento_sigfechapago
                        FROM 
                            tab_credito_movimiento 
                        WHERE
                            creditomovimiento_creditoid=".$fila['credito_id']."
                        ORDER BY 
                            creditomovimiento_id 
                        DESC 
                        LIMIT 
                            1;
                    ");
                    if ($fila2 = mysql_fetch_row($con->getResultado())) {       
                        $fila['credito_saldo']=$fila2[0];
                        $fila['credito_sigfechapago']=$fila2[1];
                    }
                    else{
                        $fila['credito_saldo']='0.00';
                        $fila['credito_sigfechapago']=$fila['credito_fechapago'];
                    }
                    $salida[$i]=$fila;
                    $i++;
                }
                echo json_encode($salida);
                break;

        case 'getNumeroCuenta':
            $con->consulta("
                SELECT 
                    i.institucionsalud_id
                FROM 
                    tab_asociado a,
                    tab_institucion_salud i
                WHERE
                    a.asociado_correlativo = '".$_POST['corasociado']."'
                AND
                    a.asociado_institucionsaludid=i.institucionsalud_id;
            ");
            if ($fila2 = mysql_fetch_row($con->getResultado())) {       
                echo $fila2[0]."-00-".$_POST['corasociado'];
            }
            else{
                echo "Error al guardar";
            }
            break;

        case 'getNumeroCuenta2':
            $con->consulta("
                SELECT 
                    tipocuenta_correlativo 
                FROM 
                    tab_tipo_cuenta 
                WHERE 
                    tipocuenta_id=".$_POST['tipcueid'].";
            ");
            if ($fila2 = mysql_fetch_row($con->getResultado())) {       
                echo $fila2[0];
            }
            else{
                echo "Error al guardar";
            }
            break;

        case 'getMontoApertura':
            $con->consulta("SELECT cuentamovimiento_saldo FROM tab_cuenta_movimiento WHERE cuentamovimiento_concepto='Apertura de cuenta' and cuentamovimiento_cuentaid='".$_POST['cuentaid']."' ");
            if($row = mysql_fetch_row($con->getResultado())){
                echo $row[0];
            }
            break;

        case 'getAutorizados':
            $sql="SELECT * FROM tab_cuenta_autorizados WHERE cuentaautorizados_cuentaid='".$_POST['cuentaid']."'";
            $rs=mysql_query($sql);
            while ($obj=mysql_fetch_object($rs)){
                $dataut[]=array(
                    'cuentaid'=>$obj->cuentaautorizados_cuentaid,
                    'nombre'=>$obj->cuentaautorizados_nombre,
                    'dui'=>$obj->cuentaautorizados_dui,
                    'nit'=>$obj->cuentaautorizados_nit
                );
            }
            echo ''.json_encode($dataut).'';
            break;
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>