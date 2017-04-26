<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();


    $nombretabla = 'tab_credito';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/


    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':


/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
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
                            ".$_POST['cuo'].",
                            ".$_POST['feccon'].",
                            ".$_POST['fecpag'].",
                            ".$_POST['pla'].",
                            ".$_POST['fecfin'].",
                            ".$_POST['est'].",
                            ".$_POST['solcreid'].",
                            ".$_POST['tipcreid']."
                    );
                ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;
    	case 'upd':
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

            $con->consulta("UPDATE 
                ".$nombretabla." SET 
                    credito_monto='".$_POST['nom']."',
                    credito_cuota='".$_POST['cuo']."',
                    credito_fechacontrato='".$_POST['feccon']."',
                    credito_fechapago='".$_POST['fecpag']."',
                    credito_plazo='".$_POST['pla']."',
                    credito_fechafin='".$_POST['fecfin']."',
                    credito_estado='".$_POST['est']."', 
                    credito_solicitudcreditoid='".$_POST['solcreid']."', 
                    credito_tipocreditoid='".$_POST['tipcreid']."' 
                WHERE 
                    tipocredito_id=".$_POST['id'].";
            ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':

/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("DELETE FROM 
                ".$nombretabla." 
                WHERE 
                    credito_id='".$_POST['id']."';
            ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;
		













































        case 'getjsontabla':
            $con->consulta("SELECT asociado_nombre,asociado_dui,credito_monto,credito_estado,tipocredito_nombre FROM tab_asociado, tab_credito, tab_tipo_credito, tab_solicitud_credito WHERE tipocredito_id=credito_tipocreditoid and credito_solicitudcreditoid=solicitudcredito_id");
            $i=0;$salida=array();
            while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                $salida[$i]=$fila;
                $i++;
            }
            echo json_encode($salida);
            break;

        case 'addsol':
            $con->consulta("BEGIN");
            try{
                $con->consulta("INSERT INTO tab_solicitud_credito(
                    solicitudcredito_sexo,
                    solicitudcredito_telefonofijo,
                    solicitudcredito_telefonocelular,
                    solicitudcredito_lugartrabajo,
                    solicitudcredito_direcciontrabajo,
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
                    solicitudcredito_asociadoid) VALUES(
                    '".$_POST['sex']."',
                    '".$_POST['tel']."',
                    '".$_POST['cel']."',
                    '".$_POST['lugt']."',
                    '".$_POST['dirt']."',
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
                    '".$_POST['suel']."',
                    '".$_POST['otroi']."',
                    '".$_POST['toti']."',
                    '".$_POST['gasv']."',
                    '".$_POST['pagd']."',
                    '".$_POST['otroe']."',
                    '".$_POST['tote']."',
                    '".$_POST['nomr']."',
                    '".$_POST['dirr']."',
                    '".$_POST['telr']."',
                    '".$_POST['celr']."',
                    '".$_POST['lugtr']."',
                    '".$_POST['dirtr']."',
                    '".$_POST['idid']."'
                    )");

                //$con->consulta();
            $con->consulta('COMMIT');
            }catch(Exception $e){
                $con->consulta('ROLLBACK');
                echo 'Error al guardar: ',$e->getMessage(),"\n";
            }

            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            # code...
            break;


    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>