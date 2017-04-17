<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_cuenta';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
                        cuenta_id,
                        cuenta_monto,
                        cuenta_fechaapertura,
                        cuenta_estado,
                        cuenta_asociadoid,
                        cuenta_tipocuentaid

                    ) 
                    VALUES(
                        '".$_POST['cueid']."',
                        '".$_POST['mon']."',
                        '".$_POST['fecape']."',
                        '".$_POST['est']."',
                        ".$_POST['asoid'].",
                        ".$_POST['tipcueid']."
                    );
                ");
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;
    	case 'upd':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("
                UPDATE 
                    ".$nombretabla." 
                SET 
                    cuenta_fechaapertura='".$_POST['fecape']."',
                    cuenta_monto='".$_POST['mon']."',
                    cuenta_tipocuentaid=".$_POST['tipcueid'].",
                    cuenta_estado='".$_POST['est']."'
                WHERE 
                    cuenta_id=".$_POST['id'].";
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':
        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("
                DELETE FROM 
                    ".$nombretabla." 
                WHERE 
                    cuenta_id='".$_POST['id']."';
            ");
        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;     
		case 'getjsontabla':
                $con->consulta("
                    SELECT 
                        c.*,
                        a.asociado_nombre AS cuenta_asociadonombre,
                        t.tipocuenta_nombre AS cuenta_tipocuentanombre

                    FROM 
                        tab_cuenta c,
                        tab_asociado a,
                        tab_tipo_cuenta t
                    WHERE
                        c.cuenta_asociadoid=a.asociado_id
                    AND
                        c.cuenta_tipocuentaid=t.tipocuenta_id;
                ");
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                    $salida[$i]=$fila;
                    $i++;
                }
                echo json_encode($salida);
                break;
        case 'getNumeroCuenta':
                echo "01-".$_POST['tipocuenta']."-";
                echo mt_rand(100,999);
                break;
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>