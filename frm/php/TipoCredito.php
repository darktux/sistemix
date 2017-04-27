<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_tipo_credito';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS***********************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*********************************************************/
            $con->consulta("INSERT INTO 
                ".$nombretabla."(
                    tipocredito_correlativo,
                    tipocredito_nombre,
                    tipocredito_interes,
                    tipocredito_interesxmora,
                    tipocredito_plazomaximo,
                    tipocredito_montominimo,
                    tipocredito_montomaximo
                ) 
                VALUES(
                    '".$_POST['cor']."',
                    '".$_POST['nom']."',
                    ".$_POST['int'].",
                    ".$_POST['intmor'].",
                    ".$_POST['plamax'].",
                    ".$_POST['monmin'].",
                    ".$_POST['monmax']."
                );
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*********************************************************/
            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            break;
    	case 'upd':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*********************************************************/
            $con->consulta("UPDATE 
                ".$nombretabla." SET
                    tipocredito_correlativo='".$_POST['cor']."', 
                    tipocredito_nombre='".$_POST['nom']."',
                    tipocredito_interes=".$_POST['int'].",
                    tipocredito_interesxmora=".$_POST['intmor'].",
                    tipocredito_plazomaximo=".$_POST['plamax'].",
                    tipocredito_montominimo=".$_POST['monmin'].",
                    tipocredito_montomaximo=".$_POST['monmax']." 
                WHERE 
                    tipocredito_id=".$_POST['id'].";
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************/
			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************/
            $con->consulta("DELETE FROM 
                ".$nombretabla." 
                WHERE 
                    tipocredito_id='".$_POST['id']."';
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************/
            if($con->getResultado()){echo "Registro eliminado";}else{echo "Error al eliminar";}
            break;
		case 'getjsontabla':
                $con->consulta("SELECT 
                        * 
                    FROM 
                        ".$nombretabla.";
                ");
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                    $salida[$i]=$fila;
                    $i++;
                }
                echo json_encode($salida);
                break;
        case 'getjsonselect':
                $con->consulta("SELECT 
                        tipocredito_id,
                        tipocredito_nombre,
                        tipocredito_interes
                    FROM 
                        ".$nombretabla.";
                ");
                $i=0;
                $salida=array();
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