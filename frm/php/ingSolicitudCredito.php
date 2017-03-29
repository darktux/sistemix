<?php  
	require('Conex.php');
	$con= new Conex();
	$con->conectar();


switch ($_POST['acc']) {

		case 'set':
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

				$sql="INSERT INTO tab_asociado (
				asociado_nombre,
				asociado_sexo,
				asociado_dui,
				asociado_nit,
				asociado_fechanacimiento,
				asociado_profesionoficio,
				asociado_direccion,
				asociado_estadocivil,
				asociado_telefonofijo,
				asociado_telefonocelular,
				asociado_lugartrabajo,
				asociado_direcciontrabajo,
				asociado_jefeinmediato,
				asociado_tiempotrabajo,
				asociado_puesto,
				asociado_salario,
				asociado_telefonotrabajo,
				asociado_nombreconyuge,
				asociado_sexoconyuge,
				asociado_duiconyuge,
				asociado_nitconyuge,
				asociado_fechanacimientoconyuge,
				asociado_profesionoficioconyuge,
				asociado_direccionconyuge,
				asociado_estadocivilconyuge,
				asociado_telefonofijoconyuge,
				asociado_telefonocelularconyuge,
				asociado_lugartrabajoconyuge,
				asociado_direcciontrabajoconyuge,
				asociado_sueldomensual,
				asociado_otrosingresos,
				asociado_totalingresos,
				asociado_gastovida,
				asociado_pagodeudas,
				asociado_otrosegresos,
				asociado_totalegresos,
				asociado_nombrereferencia,
				asociado_direccionreferencia,
				asociado_telefonofijoreferencia,
				asociado_telefonocelularreferencia,
				asociado_lugartrabajoreferencia,
				asociado_direcciontrabajoreferencia
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
				echo $sql;

				$con->consulta($sql);
				if($con->getResultado()){
			        echo "Datos guardados";
			    }
			    else{
			        echo "Error al guardar";
			    }
		break;
		
		case 'busca':

				echo "
					<script>
						alert('".$_POST['field']."');
					</script>

				";
         		if($_POST['aux']==1)
         				$con->consulta("SELECT asociado_id, asociado_nombre, asociado_dui, asociado_nit FROM tab_asociado where asociado_dui like '%".$_POST['field']."%'");
         		if($_POST['aux']==2)
         				$con->consulta("SELECT asociado_id, asociado_nombre, asociado_dui, asociado_nit FROM tab_asociado where asociado_nit like '%".$_POST['field']."%'");
         		if($_POST['aux']==3)
         				$con->consulta("SELECT asociado_id, asociado_nombre, asociado_dui, asociado_nit FROM tab_asociado where asociado_nombre like '%".$_POST['field']."%'");

				while ($row = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)){
							
					$cod_per= $row['asociado_id'];
					$nom= $row['asociado_nombre'];
					$dui=$row['asociado_dui'];
					$nit=$row['asociado_nit'];
						
					echo "
						<tr>
							<td style='display:none'>".$cod_per."</td>
							<td>".$dui."</td>
							<td>".$nom."</td>
							<td>".$nit."</td>
							<td align='center'>
								<a class='btn'  onclick=\"$('#nom').val('".$nom."'); $('#cod').val('".$cod_per."'); $('#modal1').modal('close'); $('#lnom').addClass('active');\"><i class='large material-icons'>info</i></a>
							    
							    
							</td>
							
						</tr>
					";
					
				}
				
			break;

}
?>