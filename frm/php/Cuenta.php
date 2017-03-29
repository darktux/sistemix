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
                        credito_monto,
                        credito_fechaapertura,
                        credito_estado,
                        credito_asociadoid,
                        credito_tipocuentaid

                    ) 
                    VALUES(
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

            $con->consulta("UPDATE 
                ".$nombretabla." SET 
                    credito_monto='".$_POST['nom']."',
                    credito_fechaapertura='".$_POST['fecape']."',
                    credito_estado='".$_POST['est']."', 
                    credito_asociadoid=".$_POST['asoid'].", 
                    credito_tipocuentaid=".$_POST['tipcueid']."
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
                    cuenta_id='".$_POST['id']."';
            ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/











































            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;

        
		case 'getjsontabla':
                $con->consulta("SELECT * FROM 
                    ".$nombretabla.";"
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