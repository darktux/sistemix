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
                        c.credito_tipocreditoid=t.tipocredito_id
                    AND 
                        c.credito_estado='Activo';
                ");
                $resultadoaux = $con->getResultado();
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
                    $con->consulta("
                        SELECT 
                            creditomovimiento_saldo,creditomovimiento_fecha
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
        case 'getjsontabla2'://no borrar, se utiliza en solicitud de credito. Att Duglas

                $con->consulta("
                    SELECT 
                        asociado_id,
                       asociado_nombre,
                        asociado_dui, 
                        asociado_nit
                       
                    FROM 
                        tab_asociado
                    where
                        asociado_estado like 'Activo' 
                ");
                $resultadoaux = $con->getResultado();
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
                    $salida[$i]=$fila;
                    $i++;
                }
                echo json_encode($salida);
                break;

            case 'getcuota'://no borrar, se utiliza en solicitud de credito. Att Duglas
              
               $rs = mysql_query("SELECT tipocredito_interes FROM  tab_tipo_credito WHERE tipocredito_id=".$_POST['credid']);
                    if ($row = mysql_fetch_row($rs)) {
                        $i = trim($row[0]);
                    }
               // $i=$con->getResultado();
                $tiempo=$_POST['tiempo'];
                $monto=$_POST['monto'];
                $interes=($i/12)/100;
               
                //echo $interes;
                $constante=pow((1+$interes),$tiempo);
                $arriba=$constante*$interes;
                $abajo=$constante-1;
                $cuota=round((($monto)*($arriba/$abajo)),2);
                echo $cuota;
             break;

             case 'addsol'://no borrar, se utiliza en solicitud de credito
                $con->consulta("BEGIN");
                try{
                    $con->consulta(
                        "
                            INSERT INTO 
                                tab_solicitud_credito(
                                    solicitudcredito_sexo,
                                    solicitudcredito_telefonofijo,
                                    solicitudcredito_telefonocelular,
                                    solicitudcredito_jefeinmediato,
                                    solicitudcredito_tiempotrabajo,
                                    solicitudcredito_puesto,
                                    solicitudcredito_telefonotrabajo,
                                    solicitudcredito_nombreconyuge,
                                    solicitudcredito_sexoconyuge,
                                    solicitudcredito_duiconyuge,
                                    solicitudcredito_nitconyuge,
                                    solicitudcredito_fechanacimientoconyuge,
                                    solicitudcredito_profesionoficioconyuge,
                                    solicitudcredito_direccionconyuge,
                                    solicitudcredito_estadocivilconyuge,
                                    solicitudcredito_telefonofijoconyuge,
                                    solicitudcredito_telefonocelularconyuge,
                                    solicitudcredito_lugartrabajoconyuge,
                                    solicitudcredito_direcciontrabajoconyuge,
                                    solicitudcredito_sueldomensual,
                                    solicitudcredito_otrosingresos,
                                    solicitudcredito_totalingresos,
                                    solicitudcredito_gastovida,
                                    solicitudcredito_pagodeudas,
                                    solicitudcredito_otrosegresos,
                                    solicitudcredito_totalegresos,

                                    solicitudcredito_nombrereferencia,
                                    solicitudcredito_direccionreferencia,
                                    solicitudcredito_telefonofijoreferencia,
                                    solicitudcredito_telefonocelularreferencia,
                                    solicitudcredito_lugartrabajoreferencia,
                                    solicitudcredito_direcciontrabajoreferencia,
                                    
                                    solicitudcredito_nombrereferencia_laboral, 
                                    solicitudcredito_direccionreferencia_laboral, 
                                    solicitudcredito_telefonofijoreferencia_laboral, 
                                    solicitudcredito_telefonocelularreferencia_laboral, 
                                    solicitudcredito_lugartrabajoreferencia_laboral, 
                                    solicitudcredito_direcciontrabajoreferencia_laboral, 

                                    solicitudcredito_asociadoid,
                                    solicitudcredito_tipopago
                                ) 
                            VALUES
                                (
                                    '".$_POST['sex']."',
                                    '".$_POST['tel']."',
                                    '".$_POST['cel']."',
                                    '".$_POST['jefe']."',
                                    '".$_POST['timet']."',
                                    '".$_POST['pues']."',
                                    '".$_POST['telt']."',
                                    '".$_POST['nomc']."',
                                    '".$_POST['sexc']."',
                                    '".$_POST['duic']."',
                                    '".$_POST['nitc']."',
                                    '".$_POST['fecc']."',
                                    '".$_POST['proc']."',
                                    '".$_POST['dirc']."',
                                    '".$_POST['estc']."',
                                    '".$_POST['telc']."',
                                    '".$_POST['celc']."',
                                    '".$_POST['lugc']."',
                                    '".$_POST['dirtc']."',
                                    ".$_POST['suel'].",
                                    ".$_POST['otroi'].",
                                    ".$_POST['toti'].",
                                    ".$_POST['gasv'].",
                                    ".$_POST['pagd'].",
                                    ".$_POST['otroe'].",
                                    ".$_POST['tote'].",
                                    
                                    '".$_POST['nomr']."',
                                    '".$_POST['dirr']."',
                                    '".$_POST['telr']."',
                                    '".$_POST['celr']."',
                                    '".$_POST['lugtr']."',
                                    '".$_POST['dirtr']."',

                                    '".$_POST['nomrlab']."',
                                    '".$_POST['dirrlab']."',
                                    '".$_POST['telrlab']."',
                                    '".$_POST['celrlab']."',
                                    '".$_POST['lugtrlab']."',
                                    '".$_POST['dirtrlab']."',

                                    '".$_POST['idid']."',
                                    '".$_POST['tippag']."'
                                )
                        "
                    );

                    $rs = mysql_query("SELECT MAX(solicitudcredito_id) AS id FROM tab_solicitud_credito");
                        if ($row = mysql_fetch_row($rs)) {
                                $id = trim($row[0]);
                                $sql="INSERT INTO tab_credito(
                                credito_monto,
                                credito_cuota,
                                credito_fechacontrato,
                                credito_fechapago,
                                credito_plazo,
                                credito_fechafin,
                                credito_estado,
                                credito_solicitudcreditoid,
                                credito_tipocreditoid
                                ) 
                                VALUES('".$_POST['mon']."',
                                        '".$_POST['cuo']."',
                                        '".$_POST['feccon']."',
                                        '".$_POST['fecpag']."',
                                        '".$_POST['pla']."',
                                        '".$_POST['fecfin']."',
                                        '".$_POST['est']."',
                                        '".$id."',
                                        '".$_POST['tipcreid']."'
                                )";
                                //echo $sql;
                                $con->consulta($sql);

                                //Agrego codeudores
                                $sql = "INSERT INTO tab_codeudor(
                                codeudor_nombre, 
                                codeudor_dui,
                                codeudor_nit,
                                codeudor_edad,
                                codeudor_profesionuoficio,
                                codeudor_direccion,
                                codeudor_estadocivil,
                                codeudor_telefono,
                                codeudor_celular,
                                codeudor_jefeinmediato,
                                codeudor_tiempotrabajo,
                                codeudor_puesto,
                                codeudor_salario,
                                codeudor_telefonotrabajo,
                                codeudor_email,
                                codeudor_otrosingresos,
                                codeudor_gastovida,
                                codeudor_pagodeudas,
                                codeudor_otrosegresos,
                                codeudor_nombreref1,
                                codeudor_direccionref1,
                                codeudor_telefonoref1,
                                codeudor_celularref1,
                                codeudor_lugartrabajoref1,
                                codeudor_nombreref2,
                                codeudor_direccionref2,
                                codeudor_telefonoref2,
                                codeudor_celularref2,
                                codeudor_lugartrabajoref2) 
                                VALUES (
                                '".$_POST['nomco']."',
                                '".$_POST['duico']."',
                                '".$_POST['nitco']."',
                                '".$_POST['edadco']."',
                                '".$_POST['prouofco']."',
                                '".$_POST['dirco']."',
                                '".$_POST['estcco']."',
                                '".$_POST['telco']."',
                                '".$_POST['celco']."',
                                '".$_POST['nomjefeco']."',
                                '".$_POST['tietraco']."',
                                '".$_POST['puestoco']."',
                                '".$_POST['suelmenco']."',
                                '".$_POST['teltraco']."',
                                '".$_POST['emailco']."',
                                '".$_POST['otringco']."',
                                '".$_POST['gastvidco']."',
                                '".$_POST['pagdeuco']."',
                                '".$_POST['otregrco']."',
                                '".$_POST['nomrco1']."',
                                '".$_POST['dirrco1']."',
                                '".$_POST['telrco1']."',
                                '".$_POST['celrco1']."',
                                '".$_POST['lugtrco1']."',
                                '".$_POST['nomrco2']."',
                                '".$_POST['dirrco2']."',
                                '".$_POST['telrco2']."',
                                '".$_POST['celrco2']."',
                                '".$_POST['lugtrco2']."'
                                )";
                                $con->consulta($sql);
                            }

                        $con->consulta('COMMIT');
                }catch(Exception $e){
                    $con->consulta('ROLLBACK');
                    echo 'Error al guardar: hola',$e->getMessage(),"\n";
                }
                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;

            case 'active':
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("BEGIN");
                try{
                    $con->consulta(
                        "
                            UPDATE 
                                tab_solicitud_credito 
                            SET 
                                solicitudcredito_fechasesion ='".$_POST['fecses']."',
                                solicitudcredito_numacta =".$_POST['nacta'].",
                                solicitudcredito_numpunto ='".$_POST['npunto']."',
                                solicitudcredito_numrefcre ='".$_POST['nrefcre']."'
                            WHERE 
                                solicitudcredito_id=".$_POST['selfid'].";
                        "
                    );

                    $con->consulta(
                        "
                            UPDATE 
                                tab_credito 
                            SET 
                                credito_estado = 'Activo'
                            WHERE 
                                credito_id=".$_POST['creid1'].";
                        "
                    );
                    
                    
                    $con->consulta(
                        "
                            INSERT INTO
                                tab_credito_movimiento(
                                    creditomovimiento_concepto,
                                    creditomovimiento_fecha,
                                    creditomovimiento_deposito,
                                    creditomovimiento_retiro,
                                    creditomovimiento_interes,
                                    creditomovimiento_capital,
                                    creditomovimiento_saldo,
                                    creditomovimiento_creditoid  
                                )
                            VALUES
                                (
                                    'Registro inicial del credito',
                                    '".$_POST['fecses']."',
                                    0.00,
                                    ".$_POST['cremon1'].",
                                    0.00,
                                    0.00,
                                    ".$_POST['cremon1'].",
                                    ".$_POST['creid1']."
                                );
                        "
                    );

                    
                    $con->consulta("COMMIT");
                }catch(Exception $e){
                    $con->consulta('ROLLBACK');
                    echo 'Error al guardar: ',$e->getMessage(),"\n";
                }
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
            break;

            case 'delsol':
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("
                    DELETE FROM 
                        ".$nombretabla." 
                    WHERE 
                        credito_id='".$_POST['creid2']."';
                ");
                $con->consulta("
                    DELETE FROM 
                        tab_solicitud_credito 
                    WHERE 
                        solicitudcredito_id='".$_POST['selfid2']."';
                ");
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
                break;  

            case 'getjsontabla3':// no borrar, se utiliza en solicutd de credito
                $con->consulta(
                    "
                        SELECT 
                            solicitudcredito_id,
                            solicitudcredito_tipopago,
                            asociado_correlativo,
                            asociado_nombre,
                            asociado_dui,
                            asociado_nit,
                            credito_id,
                            credito_monto,
                            credito_estado,
                            tipocredito_nombre,
                            tipocredito_correlativo 
                        FROM 
                            tab_asociado, 
                            tab_credito, 
                            tab_tipo_credito, 
                            tab_solicitud_credito 
                        WHERE 
                            tipocredito_id=credito_tipocreditoid 
                        and 
                            credito_solicitudcreditoid=solicitudcredito_id 
                        and 
                            solicitudcredito_asociadoid=asociado_id
                        and 
                            credito_estado != 'Activo';
                    "
                );
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