<?php
	date_default_timezone_set('America/El_Salvador');
    require('Conex.php');
	$con= new Conex();
	$con->conectar();
    $nombretabla = 'tab_solicitud_credito';/*CAMBIAR EL NOMBRE DE LA TABLA SEGUN LA BASE DE DATOS*********************************************************************/
    if(isset($_GET['acc'])){$_POST['acc']=$_GET['acc'];}
	switch ($_POST['acc']) {
		case 'set':
            //Datos a guardar
            break;
        case 'getjsontabla':
            $con->consulta("
                SELECT 
                   *
                FROM 
                    ".$nombretabla."
                WHERE 
                    solicitudcredito_id = '".$_POST['idsol']."'
                ;
            ");
            $salida=array();         
            if ($fila = mysql_fetch_row($con->getResultado())) {       
                $salida[$i]=$fila;
            }
                          
            echo json_encode($salida);
            break;
    }
	//$con->limpiarConsulta();
    $con->desconectar();

?>

