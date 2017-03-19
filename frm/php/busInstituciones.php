<?php 
	require('Conex.php');
	$con= new Conex();
	$con->conectar();

	switch ($_POST['caso']) {
		case 'bus':
			$sql="SELECT institucionsalud_id,institucionsalud_nombre FROM tab_institucion_salud";
			$con->consulta($sql);
			$i=0;
			$salida=array();
				while ($fila = mysql_fetch_array($con->getResultado(), MYSQL_ASSOC)) {
					$salida[$i]=$fila;
					$i++;
				}
				echo json_encode($salida);
			break;
		
		default:
				# code...
			break;
	}
?>