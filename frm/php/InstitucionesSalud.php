<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
















































    $nombretabla = 'tab_institucion_salud';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/



















































    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
































/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
                        institucionsalud_nombre,
                        institucionsalud_direccion
                    ) 
                    VALUES('".$_POST['nom']."',
                            '".$_POST['dir']."'
                    );
                ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/






























                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;
    	case 'upd':




































/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

            $con->consulta("UPDATE 
                ".$nombretabla." SET 
                    institucionsalud_nombre='".$_POST['nom']."',
                    institucionsalud_direccion='".$_POST['dir']."' 
                WHERE 
                    institucionsalud_id=".$_POST['id'].";
            ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/




















































			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':











































/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("DELETE FROM 
                ".$nombretabla." 
                WHERE 
                    institucionsalud_id='".$_POST['id']."';
            ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/











































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
                        institucionsalud_id,
                        institucionsalud_nombre 
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