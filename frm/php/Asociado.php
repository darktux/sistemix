<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();


    $nombretabla = 'tab_asociado';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/

    date_default_timezone_set('AMERICA/EL_SALVADOR');


    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
                /*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                /*el numero 1 abajo es el id de la empresa principal*/
                $sql1 = "INSERT INTO 
                    ".$nombretabla."(
                        asociado_nombre,
                        asociado_dui,
                        asociado_nit,
                        asociado_extendido,
                        asociado_fechaextendido,
                        asociado_lugarnacimiento,
                        asociado_fechanacimiento,
                        asociado_nacionalidad,
                        asociado_estadocivil,
                        asociado_departamento,
                        asociado_municipio,
                        asociado_direccion,
                        asociado_profesionoficio,
                        asociado_ingresomes,
                        asociado_estado,
                        asociado_institucionsaludid,
                        asociado_sucursalid
                    ) 
                    VALUES('".$_POST['nom']."',
                        '".$_POST['dui']."',
                        '".$_POST['nit']."',
                        '".$_POST['ext']."',
                        '".$_POST['fecdui']."',
                        '".$_POST['lugnac']."',
                        '".$_POST['fecnac']."',
                        '".$_POST['nac']."',
                        '".$_POST['est']."',
                        '".$_POST['dep']."',
                        '".$_POST['mun']."',
                        '".$_POST['dir']."',
                        '".$_POST['prouof']."',
                        '".$_POST['ingmen']."',
                        '".$_POST['status']."',
                        '".$_POST['inst']."',
                        '1'
                    );
                ";
                // deshabilitamos el autocommit para llevar a cabo la transacción con varias sentencias
                $con->consulta('BEGIN');
                try{
                    $con->consulta($sql1);
                    //Obtengo id del asociado ingresado
                    $rs = mysql_query("SELECT MAX(asociado_id) AS id FROM tab_asociado");
                    if ($row = mysql_fetch_row($rs)) {
                        $id = trim($row[0]);
                    }
                    for ($i=1; $i < 5; $i++) { 
                        if( strcmp( $_POST['nom'.$i] ,"")!=0 ){
                            $sql2="
                            INSERT INTO 
                                tab_beneficiario(
                                    beneficiario_nombre,
                                    beneficiario_direccion,
                                    beneficiario_parentezco,
                                    beneficiario_porcentaje,
                                    beneficiario_asociadoid
                                )
                            VALUES(
                                '".$_POST['nom'.$i]."',
                                '".$_POST['dir'.$i]."',
                                '".$_POST['par'.$i]."',
                                '".$_POST['por'.$i]."',
                                '".$id."'
                            );
                        ";

                            //echo $sql2;
                            $con->consulta($sql2);
                            
                        }


                    }
                    $con->consulta('COMMIT');

                }catch(Exception $e){
                    $con->consulta('ROLLBACK');
                    echo 'Error al guardar: ',$e->getMessage(),"\n";
                }


                 $con->consulta('BEGIN');
                try{
                   // $con->consulta($sql1);
                    //Obtengo id del asociado ingresado
                    $fecaper=DATE('Y-m-d');
                    $rs = mysql_query("SELECT MAX(asociado_id) AS id FROM tab_asociado");
                    if ($row = mysql_fetch_row($rs)) {
                        $id = trim($row[0]);
                    }
                    for ($i=1; $i < 5; $i++) { 
                        if( strcmp( $_POST['nom'.$i] ,"")!=0 ){
                            $sql3="
                            INSERT INTO 
                                tab_cuenta(
                                    cuenta_monto,
                                    cuenta_fechaapertura,
                                    cuenta_estado,
                                    cuenta_asociadoid,
                                    cuenta_tipocuentaid
                                )
                            VALUES( 5,
                                '".$fecaper."',
                                '1',
                                '".$id."',
                                '13'
                            );
                        ";

                            //echo $sql2;
                            $con->consulta($sql3);
                            
                        }


                    }
                    $con->consulta('COMMIT');

                }catch(Exception $e){
                    $con->consulta('ROLLBACK');
                    echo 'Error al guardar: ',$e->getMessage(),"\n";
                }
                

/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/


                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;





    	case 'upd':
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

            $sql1="UPDATE 
                ".$nombretabla." SET 
                	asociado_nombre='".$_POST['nom']."',
					asociado_dui='".$_POST['dui']."',
					asociado_nit='".$_POST['nit']."',
					asociado_extendido='".$_POST['ext']."',
					asociado_fechaextendido='".$_POST['fecdui']."',
					asociado_lugarnacimiento='".$_POST['lugnac']."',
					asociado_fechanacimiento='".$_POST['fecnac']."',
					asociado_nacionalidad='".$_POST['nac']."',
					asociado_estadocivil='".$_POST['est']."',
					asociado_departamento='".$_POST['dep']."',
					asociado_municipio='".$_POST['mun']."',
					asociado_direccion='".$_POST['dir']."',
					asociado_profesionoficio='".$_POST['prouof']."',
					asociado_ingresomes='".$_POST['ingmen']."',
					asociado_institucionsaludid='".$_POST['inst']."',
					asociado_sucursalid='1'
                WHERE 
                    asociado_id=".$_POST['id'].";
            ";
            $sql2="DELETE FROM tab_beneficiario WHERE beneficiario_asociadoid='".$_POST['id']."'";
            $con->consulta('BEGIN');
            try{

                $con->consulta($sql2);
                $con->consulta($sql1);

                for ($i=1; $i < 5; $i++) { 
                    if( strcmp( $_POST['nom'.$i] ,"")!=0 ){
                        $sql3="
                        INSERT INTO 
                            tab_beneficiario(
                                beneficiario_nombre,
                                beneficiario_direccion,
                                beneficiario_parentezco,
                                beneficiario_porcentaje,
                                beneficiario_asociadoid
                            )
                        VALUES(
                            '".$_POST['nom'.$i]."',
                            '".$_POST['dir'.$i]."',
                            '".$_POST['par'.$i]."',
                            '".$_POST['por'.$i]."',
                            '".$_POST['id']."'
                            );
                        ";

                        $con->consulta($sql3);
                        
                    }
                }
                $con->consulta('COMMIT');
            }catch(Exception $e){
                $con->consulta('ROLLBACK');
                echo 'Error al guardar: ',$e->getMessage(),"\n";
            }
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

			if($con->getResultado()){echo "Registro modificado.";}else{echo "Error al modificar.";}
    		break;
        
        case 'del':

/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
            $con->consulta("DELETE FROM 
                ".$nombretabla." 
                WHERE 
                    asociado_id='".$_POST['id']."';
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
                        tipocredito_id,
                        tipocredito_nombre 
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

        case 'busBen':
                $con->consulta("SELECT * FROM tab_beneficiario WHERE beneficiario_asociadoid='".$_POST['idasociado']."'");
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
