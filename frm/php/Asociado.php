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
                        asociado_correlativo,
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
                    VALUES('".$_POST['corr']."',
                        '".$_POST['nom']."',
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
                // Se guarda el asociado
                $con->consulta('BEGIN');
                try{
                    $con->consulta($sql1);
                    //Obtengo id del asociado ingresado
                    $rs = mysql_query("SELECT MAX(asociado_id) AS id FROM tab_asociado");
                    if ($row = mysql_fetch_row($rs)) {
                        $id = trim($row[0]);
                    }
                    //Ingreso los beneficiarios correspondientes al asociado
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
                            );";
                            $con->consulta($sql2);
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
                    asociado_correlativo='".$_POST['corr']."',
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

        case 'upd2':
        $con->consulta('BEGIN');
            try{
                $sql="UPDATE 
                    ".$nombretabla." SET 
                        asociado_fechasesion='".$_POST['fecses']."',
                        asociado_numacta='".$_POST['nacta']."',
                        asociado_numpunto='".$_POST['npunto']."',
                        asociado_estado='Activo'
                    WHERE 
                        asociado_id=".$_POST['id'].";
                ";
                $con->consulta($sql);
                //Correlativo es 01 correspondiente a Aportaciones
                //Se obtiene el monto de apertura de aportaciones
                $rs=mysql_query("SELECT tipocuenta_montoapertura,tipocuenta_id  FROM tab_tipo_cuenta WHERE tipocuenta_correlativo='01'");
                if ($row = mysql_fetch_row($rs)) {
                    $monto = trim($row[0]);
                    $tipocuentaid=trim($row[1]);
                }
                //Se abre la cuenta de aportacion a la persona
                $sql3="INSERT INTO tab_cuenta(cuenta_id,cuenta_fechaapertura,cuenta_estado,cuenta_asociadoid,cuenta_tipocuentaid) VALUES('01-01-".$_POST['corr']."','".$_POST['fecses']."','Activada','".$_POST['id']."','".$tipocuentaid."')";
                $con->consulta($sql3);
                //Se ingresa el movimiento correspondiente a la apertura
                $con->consulta("INSERT INTO tab_cuenta_movimiento(cuentamovimiento_concepto,cuentamovimiento_fecha,cuentamovimiento_deposito,cuentamovimiento_saldo,cuentamovimiento_cuentaid) VALUES ('Apertura de cuenta','".$_POST['fecses']."','".$monto."','".$monto."','01-01-".$_POST['corr']."')");
                
                $con->consulta('COMMIT');
            }catch(Exception $e){
                $con->consulta('ROLLBACK');
                echo 'Error al guardar: ',$e->getMessage(),"\n";
            }
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
                $con->consulta("
                    SELECT 
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
        case 'getjsontabla2':
                $con->consulta("SELECT asociado_id,asociado_correlativo,asociado_nombre,asociado_dui,asociado_nit,asociado_municipio,asociado_estado FROM ".$nombretabla." WHERE asociado_estado='En espera';
                ");
                $i=0;$salida=array();
                while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {       
                    $salida[$i]=$fila;
                    $i++;
                }
                echo json_encode($salida);
                break;
        case 'getjsontablaactivo':
            $con->consulta("
                    SELECT 
                        * 
                    FROM 
                        ".$nombretabla."
                    WHERE
                        asociado_estado='Activo';
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
                        asociado_id,
                        asociado_nombre 
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
        case 'getCorr':
            $rs=mysql_query("SELECT MAX(asociado_correlativo) as corr FROM tab_asociado");
            if($row=mysql_fetch_array($rs)){
                echo $row['corr'];
            }
            break;
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>
