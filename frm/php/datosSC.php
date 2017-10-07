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
        case 'getforedit':
            $con->consulta("
                SELECT 
                   s.*,c.*,t.tipocredito_id
                FROM 
                    `tab_solicitud_credito` s,
                    `tab_credito` c,
                    `tab_tipo_credito` t                    
                WHERE 
                    s.solicitudcredito_id = ".$_POST['idsolcre']."
                AND
                    c.credito_solicitudcreditoid = s.solicitudcredito_id
                AND 
                    c.credito_tipocreditoid = t.tipocredito_id
                ;
            ");
            $salida=array();         
            if ($fila = mysql_fetch_row($con->getResultado())) {       
                $salida[$i]=$fila;
            }
                          
            echo json_encode($salida);
            break;

        case 'getcodeudores':
            $con->consulta("
                SELECT 
                   codeudor_nombre,codeudor_id
                FROM 
                    `tab_codeudor`                    
                WHERE 
                    codeudor_idsolicitudcredito = ".$_POST['idsolcre']."
                ;
            ");
            $salida=array();   
            $i=0;      
            while ($fila = mysql_fetch_row($con->getResultado())) {       
                $salida[$i]=$fila;
                $i++;
            }
                          
            echo json_encode($salida);
            break;

    }
	//$con->limpiarConsulta();
    $con->desconectar();

?>

