<?php
	require('Conex.php');
	$con= new Conex();
	$con->conectar();


    $nombretabla = 'tab_asociado';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/




    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':




/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/
                $con->consulta("INSERT INTO 
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
						asociado_empresaid
                    ) 
                    VALUES(".$nom."',
						'".$dui."',
						'".$nit."',
						'".$ext."',
						'".$fecdui."',
						'".$lugnac."',
						'".$fecnac."',
						'".$nac."',
						'".$est."',
						'".$dep."',
						'".$mun."',
						'".$dir."',
						'".$prouof."',
						'".$ingmen."',
						'status',
						'".$inst."'
                    );
                ");
/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/


                if($con->getResultado()){echo "Registro guardado";} else{echo "Error al guardar";}
                break;
    	case 'upd':




/*CAMBIAR LOS NOMBRES DE LOS CAMPOS SEGUN LA BASE DE DATOS********************************************************************************/

            $con->consulta("UPDATE 
                ".$nombretabla." SET 
                	asociado_nombre='".$_POST['nom']."'
					asociado_dui='".$_POST['dui']."'
					asociado_nit='".$_POST['nit']."'
					asociado_extendido='".$_POST['ext']."'
					asociado_fechaextendido='".$_POST['fecdui']."'
					asociado_lugarnacimiento='".$_POST['lugnac']."'
					asociado_fechanacimiento='".$_POST['fecnac']."'
					asociado_nacionalidad='".$_POST['nac']."'
					asociado_estadocivil='".$_POST['est']."'
					asociado_departamento='".$_POST['dep']."'
					asociado_municipio='".$_POST['mun']."'
					asociado_direccion='".$_POST['dir']."'
					asociado_profesionoficio='".$_POST['prouof']."'
					asociado_ingresomes='".$_POST['ingmen']."'
					asociado_estado='".$_POST['?????????????????????????????????????????????????????????????']."'
					asociado_institucionsaludid='".$_POST['inst']."'
					asociado_empresai='".$_POST['']."'
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
                    tipocredito_id='".$_POST['id']."';
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
    }
	//$con->limpiarConsulta();
    $con->desconectar();
?>





<?php  
	require('Conex.php');
	$con= new Conex();
	$con->conectar();

	$nom 	=$_POST['nom'];
	$dui	=$_POST['dui'];
	$nit	=$_POST['nit'];
	$ext	=$_POST['ext'];
	$fecdui =$_POST['fecdui'];
	$lugnac	=$_POST['lugnac'];
	$fecnac =$_POST['fecnac'];
	$nac 	=$_POST['nac'];
	$est	=$_POST['est'];
	$dep 	=$_POST['dep'];
	$mun	=$_POST['mun'];
	$dir	=$_POST['dir'];
	$prouof	=$_POST['prouof'];
	$ingmen	=$_POST['ingmen'];
	$inst	=$_POST['inst'];
	//beneficiarios

	$sql1 = "INSERT INTO tab_asociado(
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
	asociado_empresaid
	) VALUES(
	'".$nom."',
	'".$dui."',
	'".$nit."',
	'".$ext."',
	'".$fecdui."',
	'".$lugnac."',
	'".$fecnac."',
	'".$nac."',
	'".$est."',
	'".$dep."',
	'".$mun."',
	'".$dir."',
	'".$prouof."',
	'".$ingmen."',
	'En espera',
	'".$inst."'
	)";

	$con->consulta('BEGIN')

	$con->consulta($sql1);
	if($con->getResultado()){
        echo "Datos guardados";
    }
    else{
        echo "Error al guardar";
    }

	for ($i=1; $i < 5; $i++) { 
		if(strcmp($_POST['nom'.$i],"")!=0){
			$sql2="INSERT INTO tab_beneficiario(
				beneficiario_nombre,
				beneficiario_direccion,
				beneficiario_parentezco,
				beneficiario_porcentaje,
				beneficiario_asociadoid
			) 
			VALUES(
				'".$_POST['nom'.$i]."',
				'".$_POST['par'.$i]."',
				'".$_POST['por'.$i]."',
				'".$_POST['dir'.$i]."'
			)";
			$con->consulta($sql2);
			if($con->getResultado()){
		        echo "Datos guardados";
		    }
		    else{
		        echo "Error al guardar";
		    }
		}
	}
?>