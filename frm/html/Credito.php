
<!-- INICIA EL BLOQUE DEL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nuevo crédito"><i class="large material-icons">add</i></a>
</div>
















































<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">





























			<h5>Nuevo crédito</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12">
					<input type="number" name="mon" id="mon" required>
					<label for="mon">Monto del crédito</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="cuo" id="cuo" min="0.00" step="0.01" required>
					<label for="cuo">Cuota a pagar</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="feccon" id="feccon" required>
					<label for="feccon">Fecha del contrato</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="fecpag" id="fecpag" required>
					<label for="fecpag">Fecha de pago</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="pla" id="pla" min="0" required>
					<label for="pla">Plazo del crédito</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="fecfin" id="fecfin" required>
					<label for="fecfin">Fecha final</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="est" id="est" required>
					<label for="est">Estado</label>
				</div>
				<!-- <div class="input-field col s12">
				    <select class="" id="solcreid" required  autocomplete="off">
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="solcreid">Solicitudes pendientes</label>
				</div> -->
				<div class="input-field col s12">
				    <select class="" id="tipcreid" required  autocomplete="off">
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="tipcreid">Tipos de crédito</label>
				</div>
			</div>
			<!-- TERMINAN ELEMENTOS DEL FORMULARIO ********************************************************************************************************************************************************-->





























		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- TERMINA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container" style="width: 1200px;">
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">














































	<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Credito.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">

















































			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>









































				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="credito_monto" data-align="center">Monto</th>
			            <th data-field="credito_cuota" data-align="center">Cuota</th>
			            <th data-field="credito_fechacontrato" data-align="center">Fecha de contrato</th>
			            <th data-field="credito_fechapago" data-align="center">Fecha de pago</th>
			            <th data-field="credito_plazo" data-align="center">Plazo</th>
			            <th data-field="credito_fechafin" data-align="center">Fecha final</th>
			            <th data-field="credito_estado" data-align="center">Estado del crédito</th>
			            <th data-field="credito_solicitudcreditoid" data-align="center">Solicitud asociada</th>
			            <th data-field="credito_tipocreditoid" data-align="center">Tipo de crédito</th>
			            <!-- TERMINAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->










































				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
	</div>
</div>
<!-- TERMINA EL BLOQUE DE LA TABLA -->
<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
/*INICIA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	$(document).ready(function(){




	/*	$.ajax({
	        type:"post",
	        url: "php/SolicitudCredito.php",
	        data:{acc:'getjsonselect'},
	        success:function(responseText){
	        	var obj = $.parseJSON(responseText);
	        	$.each(obj, function(i,item){
	        		//console.log(item.tipocredito_id);
	        		//console.log(item.tipocredito_nombre);
	        		var x = document.getElementById("solcreid");
	        		var option = document.createElement("option");
	        		option.text = item.nombre;
	        		option.value = item.id;
	        		x.add(option);
	        	});
	        	$('#solcreid').material_select('destroy');
        		$('#solcreid').material_select();
	        }
	    });*/

	    $.ajax({
	        type:"post",
	        url: "php/TipoCredito.php",
	        data:{acc:'getjsonselect'},
	        success:function(responseText){
	        	var obj = $.parseJSON(responseText);
	        	$.each(obj, function(i,item){
	        		//console.log(item.tipocredito_id);
	        		//console.log(item.tipocredito_nombre);
	        		var x = document.getElementById("tipcreid");
	        		var option = document.createElement("option");
	        		option.text = item.tipocredito_nombre;
	        		option.value = item.tipocredito_id;
	        		x.add(option);
	        	});
	        	$('#tipcreid').material_select('destroy');
        		$('#tipcreid').material_select();
	        }
	    });























/*INICIA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('.modal').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */











































				document.getElementById("mon").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/















































				$('#modalcontent').animate({scrollTop:0},{duration:"slow"});
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				$('label').removeClass("active");
				
		    	















































				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE *************************************************************************************************
				$("#solcreid").val("");
				$("#tipcreid").val("");
		        $('select').material_select('destroy');
		    	$('select').material_select();
				//TERMINA BLOQUE ANADIR CODIGO SEGUN SE NECESITE******************************************************************************************************












































			}
		});
/*FINALIZA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
	});
/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
/*INICIA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
	function submit1(){




























		if($("#idid").val() == ""){/*DATOS PARA CREAR NUEVO REGISTRO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *************************************************/
	            datos = {
	            	mon:$("#mon").val(),
	            	cuo:$("#cuo").val(),
	            	feccon:$("#feccon").val(),
	            	fecpag:$("#fecpag").val(),
	            	pla:$("#pla").val(),
	            	fecfin:$("#fecfin").val(),
	            	est:$("#est").val(),
	            	solcreid:$("#solcreid").val(),
	            	tipcreid:$("#tipcreid").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	mon:$("#mon").val(),
	            	cuo:$("#cuo").val(),
	            	feccon:$("#feccon").val(),
	            	fecpag:$("#fecpag").val(),
	            	pla:$("#pla").val(),
	            	fecfin:$("#fecfin").val(),
	            	est:$("#est").val(),
	            	solcreid:$("#solcreid").val(),
	            	tipcreid:$("#tipcreid").val(),
	            	acc:'upd'
	            }
		}
		/*DATOS PARA MODIFICAR UN REGISTRO (FIN DEL BLOQUE) ********************************************************************************************************/


























		ejecutarajax(datos);
    	return false;
	}
/*FINALIZA LA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
/*INICIA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	function operateFormatter(value, row, index) {
        return [
            '<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
                '<i class="material-icons">mode_edit</i>',
            '</a>&nbsp;',
            '&nbsp;<a class="remove ml10" href="javascript:void(0)" title="Eliminar">',
                '<i class="material-icons">delete</i>',
            '</a>'
        ].join('');
    }
/*TERMINA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {







































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
            $("#idid").val(JSON.stringify(row.credito_id).replace(/"/gi,''));
            $("#mon").val(JSON.stringify(row.credito_monto).replace(/"/gi,''));
            $("#cuo").val(JSON.stringify(row.credito_cuota).replace(/"/gi,''));
            $("#feccon").val(JSON.stringify(row.credito_fechacontrato).replace(/"/gi,''));
            $("#fecpag").val(JSON.stringify(row.credito_fechapago).replace(/"/gi,''));
            $("#pla").val(JSON.stringify(row.credito_plazo).replace(/"/gi,''));
            $("#fecfin").val(JSON.stringify(row.credito_fechafin).replace(/"/gi,''));
            $("#est").val(JSON.stringify(row.credito_estado).replace(/"/gi,''));
            $("#solcreid").val(JSON.stringify(row.credito_solicitudcreditoid).replace(/"/gi,''));
            $("#tipcreid").val(JSON.stringify(row.credito_tipocreditoid).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/

































        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {










































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del credito "+JSON.stringify(row.credito_monto).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.credito_id).replace(/"/gi,''),
	            	acc:'del'
	            }
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/








































	            ejecutarajax(datos);
            }
        }
/*TERMINA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
/*TERMINA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
function ejecutarajax(datos){
	$.ajax({
        type:"post",
















































        url: "php/Credito.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        















































        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('#modal1').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();

















































        		$('#tabla1').bootstrapTable('refresh',{url:'php/Credito.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/















































        		document.getElementById("buscar1").focus();
				$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
        	}
        	else{
        		alert(responseText);
        	}
        }
    });
}
</script>
