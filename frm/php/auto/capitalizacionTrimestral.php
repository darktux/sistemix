<?php
    //Este scrip php se ejecutara automaticamente cada tres meses mediante la funcion CRON del servidor web, la ejecucion sera exactamente los ultimos dias del los meses Marzo, Junio, Septiembre, Diciembre.
    
    //el concepto de estos registros sera automaticamente = 'Interes'

    //PASO 1: Recuperacion de todos las cuentas de ahorros
    require('../Conex.php');
    $con= new Conex();
    $con->conectar();
    $nombretabla = 'tab_cuenta';

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
    while ($fila = mysql_fetch_array($resultadoaux, MYSQL_ASSOC)) {
        

        $con->consulta("
            SELECT 
                m.cuentamovimiento_fecha 
            FROM 
                tab_cuenta_movimiento m 
            WHERE 
                m.cuentamovimiento_id = '".$fila['cuenta_id']."' 
            AND 
                m.cuentamovimiento_concepto = 'Interes' 
            ORDER BY 
                m.cuentamovimiento_id 
            DESC 
            LIMIT 
                1;
        ");


        if ($fila2 = mysql_fetch_row($con->getResultado())) {       
            $fila2['cuentamovimiento_fecha'];
            echo $fila['cuenta_id']."--".$fila2['cuentamovimiento_fecha']."<br><hr>";
        }
        else{
            echo $fila['cuenta_id']."--".$fila2['cuentamovimiento_fecha']."<br><hr>";
        }








        $i++;
    }

?>