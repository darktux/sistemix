<!-- INICIA EL BLOQUE DEL MODAL BUSCAR -->
<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
<div class="container">
	<h4 class="center teal-text">Aportación</h4>
	<div class="row">
		<a class="print ml10" href="html/reporteGeneralAportaciones.php" target="_blank" title="imprimir"><i class="material-icons">print</i>Imprimir reporte general</a>
	</div>
	<div class="row">
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla2" data-toggle="table" class="table table-striped table-hover"  data-url="php/Cuenta.php?acc=getjsontablaAportacion"lick-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter2" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
				    	<th data-field="cuenta_id" data-align="center"># Cuenta</th>
				    	<th data-field="cuenta_asociadonombre" data-align="center">Asociado</th>
			            <th data-field="cuenta_saldo" data-align="center">Total Aportado ($)</th>
			            <th data-field="cuenta_fechaapertura" data-align="center">Fecha de apertura</th>
			            <th data-field="cuenta_estado" data-align="center">Estado</th>
			            <!-- FINALIZAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->
				    </tr>
			    </thead>
			</table>
		</div>
	</div>
</div>
<script src="../js/bootstrap-table.js"></script>
<!-- FINALIZA EL BLOQUE DE LA TABLA -->

<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
	var idcuenta=0;
	/*INICIA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	$(document).ready(function(){
		$('.tooltipped').tooltip({delay: 50});
  		$('.indicator').addClass('teal');
		/*FINALIZA BLOQUE DE CONFIGURACION DEL MODAL NUEVA CUENTA */
	});   
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */

	/*INICIA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
	function operateFormatter2(value, row, index) {
        return [
        	'<a class="print ml10" href="javascript:void(0)" title="imprimir">',
                '<i class="material-icons">print</i>',
            '</a>&nbsp;',
        	'&nbsp;<a class="move ml10" href="javascript:void(0)" title="Transacción">',
                '<i class="material-icons">compare_arrows</i>',
            '</a>'
        ].join('');
    }
	/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/

	/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
    	'click .print': function (e, value, row, index) {
    		idcuenta=JSON.stringify(row.cuenta_id).replace(/"/gi,'');
        	window.open('html/reporteAportaciones.php?idc='+idcuenta,'_blank');
        }, 
        'click .move': function (e, value, row, index) {
        	idcuenta=JSON.stringify(row.cuenta_id).replace(/"/gi,'');
        	$("#formularios").load('html/AportacionMovimiento.php');
        }
	/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };

</script>