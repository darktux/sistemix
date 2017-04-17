<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_sucursal';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':

            //datos del arhivo
            $nombre_archivo = $_FILES['log']['name'];
            $tipo_archivo = $_FILES['log']['type'];
            $tamano_archivo = $_FILES['log']['size'];

            //compruebo si las características del archivo son las que deseo
            if( !( ( strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg") ) && ( $tamano_archivo < 1000000 ) ) ){
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 1000 Kb máximo.</td></tr></table>";
            }else{
                if (move_uploaded_file($_FILES['log']['tmp_name'], "../../img/logos/".$nombre_archivo)){
                    /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                    $con->consulta("INSERT INTO 
                        ".$nombretabla."(
                            sucursal_nombre,
                            sucursal_nit,
                            sucursal_razonsocial,
                            sucursal_eslogan,
                            sucursal_logo
                        ) 
                        VALUES(
                            '".$_POST['nom']."',
                            '".$_POST['nit']."',
                            '".$_POST['raz']."',
                            '".$_POST['esl']."',
                            '".$_FILES['log']['name']."'
                        );
                    ");
                    /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                }else{
                   echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            } 

            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            break;
    	case 'upd':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("UPDATE 
                ".$nombretabla." SET 
                    sucursal_nombre='".$_POST['nom']."',
                    sucursal_nit='".$_POST['int']."',
                    sucursal_razonsocial='".$_POST['intmor']."',
                    sucursal_eslogan='".$_POST['plamax']."',
                    sucursal_logo='".$_POST['monmin']."'
                WHERE 
                    sucursal_id=".$_POST['id'].";
            ");
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        case 'del':
            /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("DELETE FROM 
                ".$nombretabla." 
                WHERE 
                    sucursal_id='".$_POST['id']."';
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
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>