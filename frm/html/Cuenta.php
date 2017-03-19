
<!-- INICIA EL BLOQUE DEL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nueva cuenta"><i class="large material-icons">add</i></a>
</div>
















































<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">





























			<h5>Nueva cuenta</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12">
					<input type="number" name="mon" id="mon" required>
					<label for="mon">Monto de la cuenta</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="fecape" id="fecape" required>
					<label for="fecape">Fecha de apertura</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="est" id="est" required>
					<label for="est">Estado</label>
				</div>
				<!-- <div class="input-field col s12">
				    <select class="" id="asoid" required  autocomplete="off">
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="asoid">Asociados</label>
				</div> -->
				<div class="input-field col s12">
				    <select class="" id="tipcueid" required  autocomplete="off">
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="tipcueid">Tipos de cuenta</label>
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
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Cuenta.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">

















































			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>









































				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="cuenta_monto" data-align="center">Monto</th>
			            <th data-field="cuenta_fechaapertura" data-align="center">Fecha de apertura</th>
			            <th data-field="cuenta_estado" data-align="center">Estado</th>
			            <th data-field="cuenta_asociadoid" data-align="center">Asociado</th>
			            <th data-field="cuenta_tipocuentaid" data-align="center">Tipo de cuenta</th>
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
	        url: "php/Asociado.php",
	        data:{acc:'getjsonselect'},
	        success:function(responseText){
	        	var obj = $.parseJSON(responseText);
	        	$.each(obj, function(i,item){
	        		//console.log(item.tipocredito_id);
	        		//console.log(item.tipocredito_nombre);
	        		var x = document.getElementById("asoid");
	        		var option = document.createElement("option");
	        		option.text = item.nombre;
	        		option.value = item.id;
	        		x.add(option);
	        	});
	        	$('#asoid').material_select('destroy');
        		$('#asoid').material_select();
	        }
	    });*/

	    $.ajax({
	        type:"post",
	        url: "php/TipoCuenta.php",
	        data:{acc:'getjsonselect'},
	        success:function(responseText){
	        	var obj = $.parseJSON(responseText);
	        	$.each(obj, function(i,item){
	        		var x = document.getElementById("tipcueid");
	        		var option = document.createElement("option");
	        		option.text = item.tipocuenta_nombre;
	        		option.value = item.tipocuenta_id;
	        		x.add(option);
	        	});
	        	$('#tipcueid').material_select('destroy');
        		$('#tipcueid').material_select();
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
				$("#asoid").val("");
				$("#tipcueid").val("");
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
	            	fecape:$("#fecape").val(),
	            	est:$("#est").val(),
	            	asoid:$("#asoid").val(),
	            	tipcueid:$("#tipcueid").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	mon:$("#mon").val(),
	            	fecape:$("#fecape").val(),
	            	est:$("#est").val(),
	            	asoid:$("#asoid").val(),
	            	tipcueid:$("#tipcueid").val(),
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
            '</a>',
            '&nbsp;<a class="view ml10" href="javascript:void(0)" title="Ver más">',
                '<i class="material-icons">info</i>',
            '</a>'
        ].join('');
    }
/*TERMINA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {







































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
            $("#idid").val(JSON.stringify(row.cuenta_id).replace(/"/gi,''));
            $("#mon").val(JSON.stringify(row.cuenta_monto).replace(/"/gi,''));
            $("#fecape").val(JSON.stringify(row.cuenta_fechaapertura).replace(/"/gi,''));
            $("#est").val(JSON.stringify(row.cuenta_estado).replace(/"/gi,''));
            $("#asoid").val(JSON.stringify(row.cuenta_asociadoid).replace(/"/gi,''));
            $("#tipcueid").val(JSON.stringify(row.cuenta_tipocueid).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/

































        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {










































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro de la cuenta "+JSON.stringify(row.cuenta_monto).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.cuenta_id).replace(/"/gi,''),
	            	acc:'del'
	            }
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/








































	            ejecutarajax(datos);
            }
        },
/*TERMINA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .view': function (e, value, row, index) {





        	alert("sdfkhkj"); /********************************************************************************************************/





            
        }
/*TERMINA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
/*TERMINA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
function ejecutarajax(datos){
	$.ajax({
        type:"post",
















































        url: "php/Cuenta.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        















































        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('#modal1').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();

















































        		$('#tabla1').bootstrapTable('refresh',{url:'php/Cuenta.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/















































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
