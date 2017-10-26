<?php
    //Este scrip php se ejecutara automaticamente cada tres meses mediante la funcion CRON del servidor web, la ejecucion sera exactamente los ultimos dias del los meses Marzo, Junio, Septiembre, Diciembre.
    //el concepto de estos registros sera automaticamente = 'Intereses'
    //PASO 1: Recuperacion de todos las cuentas de ahorros
    require('../Conex.php');
    date_default_timezone_set('AMERICA/EL_SALVADOR');
    $con= new Conex();
    $con->conectar();
    $nombretabla = 'tab_cuenta';
    $ultimacapitalizacion ="";
    $hoy = date('Y-m-d');
    $con->consulta("
        SELECT 
            c.cuenta_id
        FROM 
            tab_cuenta c, tab_tipo_cuenta t
        WHERE
            t.tipocuenta_id = c.cuenta_tipocuentaid
        AND 
            t.tipocuenta_nombre LIKE '%AHORRO%';
    ");
    $resultadoaux=$con->getResultado();
    while($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
        $con->consulta("
            SELECT 
                m.cuentamovimiento_fecha 
            FROM 
                tab_cuenta_movimiento m 
            WHERE 
                m.cuentamovimiento_cuentaid = '".$fila['cuenta_id']."' 
            AND 
                m.cuentamovimiento_concepto LIKE '%Intereses%' 
            ORDER BY 
                m.cuentamovimiento_id 
            DESC LIMIT 
            1;
        ");
        if($fila2 = mysql_fetch_row($con->getResultado())) { 
            $ultimacapitalizacion=$fila2[0];      
        }
        else{
            $con->consulta("
                SELECT 
                    MIN(m.cuentamovimiento_fecha)
                FROM 
                    tab_cuenta_movimiento m 
                WHERE 
                    m.cuentamovimiento_cuentaid = '".$fila['cuenta_id']."';
            ");
            if($fila3 = mysql_fetch_row($con->getResultado())) {     
                $ultimacapitalizacion=$fila3[0];
            }
        }


        
        $diferencia = diferenciaDias($ultimacapitalizacion,$hoy);



        echo $fila['cuenta_id']."--".$ultimacapitalizacion."--".$hoy."--".$diferencia."<br><hr>";











    }

function diferenciaDias($inicio, $fin){
    $inicio = strtotime($inicio);
    $fin = strtotime($fin);
    $dif = $fin - $inicio;
    $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
    return ceil($diasFalt);
}


?>