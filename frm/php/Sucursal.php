<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_sucursal';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
            if (strcmp($_FILES["log"]["name"], '') !== 0) {
                if( !( ( strpos($_FILES['log']['type'], "png") || strpos($_FILES['log']['type'], "jpg") || strpos($_FILES['log']['type'], "jpeg") ) && ( $_FILES['log']['size'] < 1000000 ) ) ){
                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 1000 Kb máximo.</td></tr></table>";
                }
                else{
                    $ext = explode(".", $_FILES['log']['name'] );
                    $nnom= "../../img/logos/logo1.".$ext[1];
                    if (move_uploaded_file($_FILES['log']['tmp_name'], $nnom )){
                        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************************/
                        $con->consulta("INSERT INTO 
                            ".$nombretabla."(
                                sucursal_nombre,
                                sucursal_nit,
                                sucursal_razonsocial,
                                sucursal_direccion,
                                sucursal_telefono,
                                sucursal_mision,
                                sucursal_vision,
                                sucursal_valores,
                                sucursal_eslogan,
                                sucursal_logo
                            ) 
                            VALUES(
                                '".$_POST['nom']."',
                                '".$_POST['nit']."',
                                '".$_POST['raz']."',
                                '".$_POST['dir']."',
                                '".$_POST['tel']."',
                                '".$_POST['mis']."',
                                '".$_POST['vis']."',
                                '".$_POST['val']."',
                                '".$_POST['esl']."',
                                '".$nnom."'
                            );
                        ");
                        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************************/
                    }else{
                       echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                    }
                } 
            }
            else{
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS*************************************************************************/
                $con->consulta("INSERT INTO 
                    ".$nombretabla."(
                        sucursal_nombre,
                        sucursal_nit,
                        sucursal_razonsocial,
                        sucursal_direccion,
                        sucursal_telefono,
                        sucursal_mision,
                        sucursal_vision,
                        sucursal_valores,
                        sucursal_eslogan,
                        sucursal_logo
                    ) 
                    VALUES(
                        '".$_POST['nom']."',
                        '".$_POST['nit']."',
                        '".$_POST['raz']."',
                        '".$_POST['dir']."',
                        '".$_POST['tel']."',
                        '".$_POST['mis']."',
                        '".$_POST['vis']."',
                        '".$_POST['val']."',
                        '".$_POST['esl']."',
                        '../../img/logos/logo.png'
                    );
                ");
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS************************************************************************/
            }
            if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
            break;
    	case 'upd':
            if (strcmp($_FILES["log"]["name"], '') !== 0) {
                if( !( ( strpos($_FILES['log']['type'], "png") || strpos($_FILES['log']['type'], "jpg") || strpos($_FILES['log']['type'], "jpeg") ) && ( $_FILES['log']['size'] < 1000000 ) ) ){
                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png o .jpg<br><li>se permiten archivos de 1000 Kb máximo.</td></tr></table>";
                }
                else{
                    $ext = explode(".", $_FILES['log']['name'] );
                    $nnom= "../../img/logos/logo1.".$ext[1];
                    if (move_uploaded_file($_FILES['log']['tmp_name'], $nnom )){
                        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                        $con->consulta("
                            UPDATE 
                                ".$nombretabla." 
                            SET 
                                sucursal_nombre='".$_POST['nom']."',
                                sucursal_nit='".$_POST['nit']."',
                                sucursal_razonsocial='".$_POST['raz']."',
                                sucursal_direccion='".$_POST['dir']."',
                                sucursal_telefono='".$_POST['tel']."',
                                sucursal_mision='".$_POST['mis']."',
                                sucursal_vision='".$_POST['vis']."',
                                sucursal_valores='".$_POST['val']."',
                                sucursal_eslogan='".$_POST['esl']."',
                                sucursal_logo='".$nnom."'
                            WHERE 
                                sucursal_id=".$_POST['id'].";
                        ");
                        /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                    }else{
                       echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                    }
                } 
            }
            else{
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("
                    UPDATE 
                        ".$nombretabla." 
                    SET 
                        sucursal_nombre='".$_POST['nom']."',
                        sucursal_nit='".$_POST['nit']."',
                        sucursal_razonsocial='".$_POST['raz']."',
                        sucursal_direccion='".$_POST['dir']."',
                        sucursal_telefono='".$_POST['tel']."',
                        sucursal_mision='".$_POST['mis']."',
                        sucursal_vision='".$_POST['vis']."',
                        sucursal_valores='".$_POST['val']."',
                        sucursal_eslogan='".$_POST['esl']."'
                    WHERE 
                        sucursal_id=".$_POST['id'].";
                ");
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            }
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