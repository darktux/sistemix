<div class="container">
	<h4 class="center teal-text">Créditos en mora</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/MoraCreditos.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>
			            <th data-field="asociado_nombre" data-align="center">Nombre</th>
			            <th data-field="asociado_dui" data-align="center">DUI</th>
			            <th data-field="asociado_nit" data-align="center">NIT</th>
			            <th data-field="creditomovimiento_sigfechapago" data-align="center">Fecha de pago</th>
			            <th data-field="asociado_estado" data-align="center">Cuotas en mora</th>
				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
		<script src="../js/jquery.maskedinput.js"></script>
	</div>
</div>



<script>
	$(document).ready(function(){

	});
	/*INICIA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	function operateFormatter(value, row, index) {
        return [
            '<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
                '<i class="material-icons">mode_edit</i>',
            '</a>&nbsp;',
            '&nbsp;<a class="remove ml10" href="javascript:void(0)" title="Eliminar">',
                '<i class="material-icons">delete</i>',
            '</a>',
            '&nbsp;<a class="view ml10" href="javascript:void(0)" title="Ver más">',
                '<i class="material-icons">info</i>',
            '</a>'
        ].join('');
    }
	/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
		/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
            $("#idid").val(JSON.stringify(row.tipocuenta_id).replace(/"/gi,''));
            $("#cor").val(JSON.stringify(row.tipocuenta_correlativo).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.tipocuenta_nombre).replace(/"/gi,''));
            $("#int").val(JSON.stringify(row.tipocuenta_interes).replace(/"/gi,''));
            $("#monmin").val(JSON.stringify(row.tipocuenta_montominimo).replace(/"/gi,''));
            $("#cobmonmin").val(JSON.stringify(row.tipocuenta_cobromontominimo).replace(/"/gi,''));
            $("#monape").val(JSON.stringify(row.tipocuenta_montoapertura).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
		/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS*************************************/
            if(confirm("Realmente desea eliminar el registro del tipo de credito "+JSON.stringify(row.tipocuenta_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.tipocuenta_id).replace(/"/gi,''),
	            	acc:'del'
	            }
	            ejecutarajax(datos);
            }
            /*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        },
		/*FINALIZA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .view': function (e, value, row, index) {
        	alert("en construcción"); /********************************************************************************************************/          
        }
		/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
	/*FINALIZA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
</script>