<!-- INICIA EL BLOQUE DEL BOTON PARA EL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nueva transacción de credito"><i class="large material-icons">add</i></a>
</div>
<!-- FINALIZA EL BLOQUE DEL BOTON PARA EL MODAL -->
<!-- INICIA EL BLOQUE DEL MODAL -->
<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Nueva transacción de credito</h5><!-- //TITULO DEL MODAL *************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) ****************************************************-->
			<div class="row">
				<div class="input-field col s12">
					<input name="fec" id="fec" type="date" class="" readonly value="<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d");?>">
					<label for="fec" class="active">Fecha de transacción</label>
				</div>
				<div class="input-field col s12">
					<textarea id="con" name="con" class="materialize-textarea" required></textarea>
					<label for="con">Concepto</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="sal0" id="sal0" value="1000" readonly>
					<label for="sal0" class="active">Saldo anterior ($)</label>
				</div>
			    <div class="input-field col s12">
					<input type="number" name="mon" id="mon" min="1.00" step="0.01" required>
					<label for="mon" class="active">Monto a pagar ($)</label>
				</div>

				<div class="input-field col s12">
					<input type="number" name="int" id="int" readonly>
					<label for="int" class="active">Interes ($)</label>
				</div>

				<div class="input-field col s12">
					<input type="number" name="cap" id="cap" readonly>
					<label for="cap" class="active">Capital ($)</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="sal" id="sal" value="1000" readonly>
					<label for="sal" class="active">Saldo ($)</label>
				</div>
			</div>
			<!-- FINALIZAN ELEMENTOS DEL FORMULARIO **************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- FINALIZA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text" id="titulo2">Movimiento del credito</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *******************************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/CreditoMovimiento.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<!-- <th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th> -->
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*-->
				    	<th data-field="creditomovimiento_concepto" data-align="center" data-width="300">concepto</th>
				    	<th data-field="creditomovimiento_fecha" data-align="center">fecha</th>
			            <th data-field="creditomovimiento_deposito" data-align="center">Deposito ($)</th>
			            <th data-field="creditomovimiento_interes" data-align="center">Interes ($)</th>
			            <th data-field="creditomovimiento_capital" data-align="center">Capital ($)</th>
			            <th data-field="creditomovimiento_saldo" data-align="center">Saldo ($)</th>
			            <!-- FINALIZAN ELEMENTOS DE LA TABLA ****************************************************************************************-->
				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
	</div>
</div>
<!-- FINALIZA EL BLOQUE DE LA TABLA -->
<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
	/*INICIA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	$(document).ready(function(){
		$('.tooltipped').tooltip({delay: 50});
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: true //dias equivalentes  years restados for today
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
				document.getElementById("con").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL *************************************************************/
				$('#modalcontent').animate({scrollTop:0},{duration:"slow"});
				$("#mon").val("");
				getsaldo();
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				//$('label').removeClass("active");
				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE **********************************************************************************

				//FINALIZA BLOQUE ANADIR CODIGO SEGUN SE NECESITE**************************************************************************************
			}
			
		});
		/*FINALIZA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('#tabla1').bootstrapTable('refresh',{url:'php/CreditoMovimiento.php?acc=getjsontabla&idcre='+idcredito+''});
		document.getElementById('titulo2').innerHTML='Movimiento del Crédito # '+idcredito;
	});
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */ 
	$("#formulario").on(
		"submit", 
		function(e){
	    	e.preventDefault();
	    	var f = $(this);
	    	if(validarpago()){
		    	var formData = new FormData(document.getElementById("formulario"));
		    	formData.append("idcre", idcredito);
		    	formData.append("fechaactu", fechaactu);
		    	if($("#idid").val() == ""){ 
					formData.append("acc", "set");
				}
				else{
			    	formData.append("id", $("#idid").val());
			    	formData.append("acc", "upd");
				}
				$.ajax({
		            url: "php/CreditoMovimiento.php",
		            type: "post",
		            dataType: "html",
		            data: formData,
		            cache: false,
		            contentType: false,
		     		processData: false,
		        	success:function(responseText){
		        		if(/Registro/.test(responseText)){
		        			$('#modal1').modal('close');
		        			alert(responseText);
		        			$("#formulario")[0].reset();
			        		$('#tabla1').bootstrapTable('refresh',{url:'php/CreditoMovimiento.php?acc=getjsontabla&idcre='+idcredito+''});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
			        		document.getElementById("buscar1").focus();
							$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
		        		}
		        		else{
		        			alert(responseText);
			        	}
		    	    }
		        });
		    }
		}	
	);
	/*FINALIZA LA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
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
            $("#idid").val(JSON.stringify(row.capital_id).replace(/"/gi,''));
            $("#ani").val(JSON.stringify(row.capital_anio).replace(/"/gi,''));
            $("#fec").val(JSON.stringify(row.capital_fec).replace(/"/gi,''));
            $("#con").val(JSON.stringify(row.capital_concepto).replace(/"/gi,''));
            $("#dep").val(JSON.stringify(row.capital_deposito).replace(/"/gi,''));
            $("#ret").val(JSON.stringify(row.capital_retiro).replace(/"/gi,''));
            $("#sal").val(JSON.stringify(row.capital_saldo).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
		/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS*************************************/
            if(confirm("Realmente desea eliminar el registro del capital "+JSON.stringify(row.capital_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
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
        	alert("sdfkhkj"); /********************************************************************************************************/          
        }
		/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
	/*FINALIZA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	/*INICIA EL BLOQUE DE LA FUNCION AJAX*/
	function ejecutarajax(datos){
		$.ajax({
        	type:"post",
        	url: "php/Capital.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************************************************************/
	        data:datos,
    	    success:function(responseText){
        		if(/Registro/.test(responseText)){
        			$('#modal1').modal('close');
        			alert(responseText);
        			$("#formulario")[0].reset();
	        		$('#tabla1').bootstrapTable('refresh',{url:'php/CreditoMovimiento.php?acc=getjsontabla&idcre='+idcredito+''});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
	        		document.getElementById("buscar1").focus();
					$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
        		}
        		else{
        			alert(responseText);
	        	}
    	    }
    	});
	}
	/*FINALIZA EL BLOQUE DE LA FUNCION AJAX*/
	/*INICIA FUNCION PARA OBTENER DE LA BASE EL SALDO DE CAPITAL */
	function getsaldo(){
		$.ajax({
	        type:"post",
	        url: "php/CreditoMovimiento.php",
	        data:{acc:'getSaldoCredito',idcre:idcredito},
	        success:function(responseText){
	        	$("#sal0").val(responseText);
	        	$("#sal").val(responseText);
	        	//alert(responseText);
	        }
	    });
	}
	/*FINALIZA FUNCION PARA OBTENER DE LA BASE EL SALDO DE CAPITAL */
	/*INICIA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */
	function actualizasaldo(){
		var s0= parseFloat($("#sal0").val());
		if($("#mon").val()==''){m=0.00;}else{var m= parseFloat($("#mon").val());}
		
		interes = (m/4).toFixed(2);
		capital = (m-interes).toFixed(2);

		$("#cap").val( capital );
		$("#int").val( interes );
		$("#sal").val( parseFloat(''+(s0-capital).toFixed(2)));
		
		
	}
	/*FINALIZA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */
	/*INICIA FUNCION PARA VALIDAR RETIRO DE CAPITAL */
	function validarpago(){
		if( ($("#sal0").val()-$("#cap").val())<0 ){
			alert("No tiene suficiente deuda para pagar esa cantidad.");
			$("#mon").val("0.00");
			actualizasaldo();
			document.getElementById("mon").focus();
			return false;
		}
		return true;
	}
	/*FINALIZA FUNCION PARA VALIDAR RETIRO DE CAPITAL */
	/*INICIA EL BLOQUE DE LOS EVENTOS*/
	$("#mon").keyup(function() { actualizasaldo(); });
	$("#mon").blur(function() { validarpago(); });

	/*FINALIZA EL BLOQUE DE LOS EVENTOS*/
</script>
