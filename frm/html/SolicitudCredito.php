
<!-- INICIA EL BLOQUE DEL BOTON PARA EL MODAL BUSCAR --> 
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Buscar asociado"><i class="large material-icons">search</i></a>
</div>
<!-- FINALIZA EL BLOQUE DEL BOTON PARA EL MODAL BUSCAR -->
<!-- INICIA EL BLOQUE DEL MODAL BUSCAR -->
<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content" id="modalcontent">
		<h5>Buscar asociado</h5><!-- //TITULO DEL MODAL *************************************************************************************-->
		<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Credito.php?acc=getjsontabla2" data-click-to-select="false"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,10,25,50,100]">
		    <thead>
			    <tr>
			    	<th data-field="operate" data-align="center" data-formatter="operateFormatter1" data-events="operateEvents">Acciones</th>
			    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			    	<th data-field="asociado_id" data-align="center">ID</th>
		            <th data-field="asociado_nombre" data-align="center">Nombre</th>
		            <th data-field="asociado_dui" data-align="center">DUI</th>
		            <th data-field="asociado_nit" data-align="center">NIT</th>
		            <!-- FINALIZAN ELEMENTOS DE LA TABLA *********************************************************************************************-->
			    </tr>
		    </thead>
		</table>
	</div>
	<div class="modal-footer">
	<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
	</div>
</div>
<!-- FINALIZA EL BLOQUE DEL MODAL BUSCAR -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Solicitudes de crédito</h4>
	<div class="row">
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla2" data-toggle="table" class="table table-striped table-hover"  data-url="php/Credito.php?acc=getjsontabla3" data-click-to-select="false"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter2" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
				    	<th data-field="asociado_nombre" data-align="center">Asociado</th>
			            <th data-field="asociado_dui" data-align="center">DUI</th>
			            <th data-field="credito_monto" data-align="center">Monto</th>
			            <th data-field="tipocredito_nombre" data-align="center">Tipo de crédito</th>
			            <th data-field="credito_estado" data-align="center">Estado</th>
			            <!-- FINALIZAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->
				    </tr>
			    </thead>
			</table>
		</div>
	</div>
</div>
<script src="../js/bootstrap-table.js"></script>
<!-- FINALIZA EL BLOQUE DE LA TABLA -->



<!-- MODAL APROBACION DE ASOCIADO -->
<div id="modal3" class="modal modal-fixed-footer"> 
	<form class="col s12" id="formulario22" onsubmit="return submit22();">
		<input id="selfid" name="selfid" type="hidden" value="">
		<input id="cremon1" name="cremon1" type="hidden" value="">
		<input id="creid1" name="creid1" type="hidden" value="">
		<div class="modal-content" id="modalcontent">



			<h5>Aprobación del crédito</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12"> 
		          <input id="nomaprob" name="nomaprob" type="text" class="validate" disabled>
		          <label class="active" for="nomaprob">Nombre completo</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m6"> 
			         <input id="duiaprob" name="duiaprob" type="text"  minlength="10" maxlength="10" disabled>
			         <label class="active" for="duiaprob">DUI</label>
				</div>
				<div class="input-field col s12 m6"> 
			         <input id="nitaprob" name="nitaprob" type="text"  minlength="17" maxlength="17" disabled>
			         <label class="active" for="nitaprob">NIT</label>
				</div>    				
			</div>
			<div class="row">
					<div class="input-field col s6 m4">	
					<input id="nrefcre" name="nrefcre" type="text" readonly>
					<label for="nrefcre" >N° de referencia del crédito</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s4 m4">	
					<input id="fecses" name="fecses" type="date" autofocus="true" value="<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d");?>">
					<label class="active" for="fecses" >Fecha de sesión</label>
				</div>
				<div class="input-field col s4 m4">	
					<input id="nacta" name="nacta" type="number" min="0">
					<label for="nacta" >N° de acta</label>
				</div>
				<div class="input-field col s4 m4">	
					<input id="npunto" name="npunto" type="text">
					<label for="npunto" >N° de punto</label>
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


<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
	var idcuenta=0;
	/*INICIA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	$(document).ready(function(){
		
		$('.tooltipped').tooltip({delay: 50});
		
	    /*INICIA BLOQUE DE CONFIGURACION DEL MODAL BUSCAR */
		$('#modal1').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				//document.getElementById("cueid").removeAttribute("readonly");
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
			}
		});
		/*FINALIZA BLOQUE DE CONFIGURACION DEL MODAL BUSCAR */
		
		/*INICIA BLOQUE DE CONFIGURACION DEL MODAL ACTIVAR */
		$('#modal3').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				//document.getElementById("cueid").removeAttribute("readonly");
				document.getElementById("nrefcre").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/

			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
			}
		});
		/*FINALIZA BLOQUE DE CONFIGURACION DEL MODAL ACTIVAR */
		
	});
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */


	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA ACTIVAR EL CREDIITO */
	$("#formulario22").on(
		"submit", 
		function(e){
	    	e.preventDefault();
	    	var f = $(this);
	    	var formData = new FormData(document.getElementById("formulario22"));
		    
		    formData.append("acc", "active");
			
			$.ajax({
	            url: "php/Credito.php",
	            type: "post",
	            dataType: "html",
	            data: formData,
	            cache: false,
	            contentType: false,
	     		processData: false,
	        	success:function(responseText){
	        		if(/Registro/.test(responseText)){
	        			$('.modal').modal('close');
	        			alert(responseText);
	        			$("#formulario22")[0].reset();
		        		$('#tabla2').bootstrapTable('refresh',{url:'php/Credito.php?acc=getjsontabla3'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
		        		document.getElementById("buscar1").focus();
						$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
	        		}
	        		else{
	        			alert(responseText);
		        	}
	    	    }
	        });
		}	
	);
	/*FINALIZA LA FUNCION REEMPLAZO DE SUBMIT PARA ACTIVAR EL CREDITO */
	/*INICIA EL BLOQUE DEL BOTON NUEVA CUENTA DE LA TABLA ASOCIADOS*/
	function operateFormatter1(value, row, index) {
        return [
            '<a class="new ml10" href="javascript:void(0)" target="_blank" title="Nueva solicitud de crédito">',
                '<i class="material-icons">add</i>',
            '</a>'
        ].join('');
    }
/*FINALIZA EL BLOQUE DEL BOTON NUEVA CUENTA DE LA TABLA ASOCIADOS*/
/*INICIA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
	function operateFormatter2(value, row, index) {
        return [
        	'&nbsp;<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
                '<i class="material-icons">mode_edit</i>',
            '</a>',
            '&nbsp;<a class="remove ml10" href="javascript:void(0)" title="Eliminar">',
                '<i class="material-icons">delete</i>',
            '</a>',
            '&nbsp;<a class="imprimir ml10" href="javascript:void(0)" title="Imprimir">',
                '<i class="material-icons">print</i>',
            '</a>',
            
        ].join('');
    }
/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$("#formulario22")[0].reset();
        	$("#selfid").val(JSON.stringify(row.solicitudcredito_id).replace(/"/gi,''));
        	$("#cremon1").val(JSON.stringify(row.credito_monto).replace(/"/gi,''));
        	$("#creid1").val(JSON.stringify(row.credito_id).replace(/"/gi,''));
        	$("#nomaprob").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
        	$("#duiaprob").val(JSON.stringify(row.asociado_dui).replace(/"/gi,''));
        	$("#nitaprob").val(JSON.stringify(row.asociado_nit).replace(/"/gi,''));
        
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$('select').material_select('destroy');
		    $('select').material_select();

		    corrAso = JSON.stringify(row.asociado_correlativo).replace(/"/gi,'');
		    corrTipCre = JSON.stringify(row.tipocredito_correlativo).replace(/"/gi,'');
		    venOpla = JSON.stringify(row.solicitudcredito_tipopago).replace(/"/gi,'');
		    $("#nrefcre").val(corrAso+"-"+corrTipCre+"-"+venOpla);

        	$('#modal3').modal('open');
        },
/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro de solicitud de crédito de "+JSON.stringify(row.asociado_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	selfid2:JSON.stringify(row.solicitudcredito_id).replace(/"/gi,''),
	            	creid2:JSON.stringify(row.credito_id).replace(/"/gi,''),
	            	acc:'delsol'
	            }
	            $.ajax({
			        type:"post",
			        url: "php/Credito.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
			        data:datos,
			        success:function(responseText){
			        	if(/Registro/.test(responseText)){
			        		$('.modal').modal('close');
			        		alert(responseText);
			        		$('#tabla2').bootstrapTable('refresh',{url:'php/Credito.php?acc=getjsontabla3'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
			        		document.getElementById("buscar1").focus();
							$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
			        	}
			        	else{
			        		alert(responseText);
			        	}
			        }
			    });
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
	           // ejecutarajax(datos);
            }
        },
/*FINALIZA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .move': function (e, value, row, index) {
        	idcuenta=JSON.stringify(row.cuenta_id).replace(/"/gi,'');
        	$("#formularios").load('html/CuentaMovimiento.php');
        },
/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON NUEVA CUENTA (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .new': function (e, value, row, index) {
        	 /********************************************************************************************************/
        	var id=JSON.stringify(row.asociado_id).replace(/"/gi,'');
        	var name=JSON.stringify(row.asociado_nombre).replace(/"/gi,'');
        	window.open("html/datosSC.php?id="+id+"&name="+name, '_blank');
        	$('#modal1').modal('close');
   
        	
        	
        },
/*FINALIZA ACCION DEL BOTON NUEVA CUENTA (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON IMPRIMIR CONNTRATO (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .imprimir': function (e, value, row, index) {
        	idcuenta=JSON.stringify(row.cuenta_id).replace(/"/gi,'');
        	tipo_cuenta=JSON.stringify(row.cuenta_tipocuentaid).replace(/"/gi,'');
        	idasociado=JSON.stringify(row.cuenta_asociadonombre).replace(/"/gi,'');
       		window.open('php/creaPDF.php?id='+idasociado+'&tipo_cuenta='+tipo_cuenta+'&cuenta='+idcuenta,'_blank');
        }
/*FINALIZA ACCION DEL BOTON IMPRIMIR CONNTRATO (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
/*FINALIZA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
function ejecutarajax(datos){
	$.ajax({
        type:"post",
        url: "php/Cuenta.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('.modal').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();
        		$('#tabla1').bootstrapTable('refresh',{url:'php/Asociado.php?acc=getjsontabla2'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
        		$('#tabla2').bootstrapTable('refresh',{url:'php/Cuenta.php?acc=getjsontabla3'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
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