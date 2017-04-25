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


    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>