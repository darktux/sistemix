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