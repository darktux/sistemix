<?php  
	require('Conex.php');
	$con= new Conex();
	$con->conectar();

	$nom 	=$_POST['nom'];
	$sex	=$_POST['sex'];
	$fec 	=$_POST['fec'];
	$dui	=$_POST['dui'];
	$nit	=$_POST['nit'];
	$dir	=$_POST['dir'];
	$pro 	=$_POST['pro'];
	$est 	=$_POST['est'];
	$tel	=$_POST['tel'];
	$cel	=$_POST['cel'];

	$nomc	=$_POST['nomc'];
	$sexc	=$_POST['sexc'];
	$fecc 	=$_POST['fecc'];
	$duic	=$_POST['duic'];
	$nitc	=$_POST['nitc'];
	$dirc	=$_POST['dirc'];
	$proc	=$_POST['proc'];
	$estc	=$_POST['estc'];
	$telc	=$_POST['telc'];
	$celc	=$_POST['celc'];
	$lugc	=$_POST['lugc'];
	$dirtc	=$_POST['dirtc'];
	$suelc	=$_POST['suelc'];

	$lugt 	=$_POST['lugt'];
	$dirt 	=$_POST['dirt'];
	$jefe 	=$_POST['jefe'];
	$timet 	=$_POST['timet'];
	$pues 	=$_POST['pues'];
	$suel 	=$_POST['suel'];
	$telt 	=$_POST['telt'];
	$otroi 	=$_POST['otroi'];
	$toti 	=$_POST['toti'];
	$gasv 	=$_POST['gasv'];
	$pagd 	=$_POST['pagd'];
	$otroe 	=$_POST['otroe'];
	$tote 	=$_POST['tote'];

	$nomr 	=$_POST['nomr'];
	$dirr 	=$_POST['dirr'];
	$telr 	=$_POST['telr'];
	$celr 	=$_POST['celr'];
	$lugtr 	=$_POST['lugtr'];
	$dirtr 	=$_POST['dirtr'];

	$sql="INSERT INTO tab_persona (
	persona_nombre,
	persona_sexo,
	persona_dui,
	persona_nit,
	persona_fechanacimiento,
	persona_profesionoficio,
	persona_direccion,
	persona_estadocivil,
	persona_telefonofijo,
	persona_telefonocelular,
	persona_lugartrabajo,
	persona_direcciontrabajo,
	persona_jefeinmediato,
	persona_tiempotrabajo,
	persona_puesto,
	persona_salario,
	persona_telefonotrabajo,
	persona_nombreconyuge,
	persona_sexoconyuge,
	persona_duiconyuge,
	persona_nitconyuge,
	persona_fechanacimientoconyuge,
	persona_profesionoficioconyuge,
	persona_direccionconyuge,
	persona_estadocivilconyuge,
	persona_telefonofijoconyuge,
	persona_telefonocelularconyuge,
	persona_lugartrabajoconyuge,
	persona_direcciontrabajoconyuge,
	persona_sueldomensual,
	persona_otrosingresos,
	persona_totalingresos,
	persona_gastovida,
	persona_pagodeudas,
	persona_otrosegresos,
	persona_totalegresos,
	persona_nombrereferencia,
	persona_direccionreferencia,
	persona_telefonofijoreferencia,
	persona_telefonocelularreferencia,
	persona_lugartrabajoreferencia,
	persona_direcciontrabajoreferencia
	) VALUES (
	'".$nom."',
	'".$sex."',
	'".$fec."',
	'".$dui."',
	'".$nit."',
	'".$dir."',
	'".$pro."',
	'".$est."',
	'".$tel."',
	'".$cel."',
	'".$nomc."',
	'".$sexc."',
	'".$fecc."',
	'".$duic."',
	'".$nitc."',
	'".$dirc."',
	'".$proc."',
	'".$estc."',
	'".$telc."',
	'".$celc."',
	'".$lugc."',
	'".$dirtc."',
	'".$suelc."',
	'".$lugt."',
	'".$dirt."',
	'".$jefe."',
	'".$timet."',
	'".$pues."',
	'".$suel."',
	'".$telt."',
	'".$otroi."',
	'".$toti."',
	'".$gasv."',
	'".$pagd."',
	'".$otroe."',
	'".$tote."',
	'".$nomr."',
	'".$dirr."',
	'".$telr."',
	'".$celr."',
	'".$lugtr."',
	'".$dirtr."'
	)";
	

	$con->consulta($sql);
	if($con->getResultado()){
        echo "Datos guardados";
    }
    else{
        echo "Error al guardar";
    }
	
?>