<!-- INICIA EL BLOQUE DEL BOTON PARA EL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="left" data-tooltip="Nueva transacción de cuenta" onclick="consultaAportacionesPagadas();getsaldo();
				getMonto();"><i class="large material-icons">add</i></a>
	<!-- <ul>
		<li><a href="#modalAportacionV" class="btn-floating cyan tooltipped" data-position="top" data-tooltip="Aportación voluntaria"><i class="material-icons">add_circle</i></a></li>
	</ul> -->
</div>
<!-- FINALIZA EL BLOQUE DEL BOTON PARA EL MODAL -->
<!-- INICIA EL BLOQUE DEL MODAL -->
<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Nueva transacción de aportación</h5><!-- //TITULO DEL MODAL *************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) ****************************************************-->
			<!-- <div class="row"> -->
				<div class="row" hidden>
					<div class="col s12 m4">
						<label>Tipo de transacción</label>
					</div>
					<div class="input-field col s12 m4">
				    	<input type="radio" name="tiptra" id="dep1" class="with-gap actsal" required checked />
				    	<label for="dep1">Depósito</label>
					</div>
					<div class="input-field col s12 m4">
						<input type="radio" name="tiptra" id="ret1" class="with-gap actsal" required/>
						<label for="ret1">Retiro</label>
					</div>
				    <br>
				    <br>
				</div>
			<div class="row">
				<div class="input-field col s12 m6">
					<input type="number" name="sal0" id="sal0" readonly>
					<label for="sal0" class="active">Saldo anterior ($)</label>
				</div>
				
				<div class="input-field col s12 m6">
					<input type="text" name="sal" id="sal" readonly>
					<label for="sal" class="active">Nuevo saldo ($)</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m3">
					<input name="fec" id="fec" type="date" required value="<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d");?>">
					<label for="fec" class="active">Fecha de transacción</label>
				</div>
				<div class="input-field col s12 m3">
					<input type="text" name="compro" id="compro" maxlength="20">
					<label for="compro" class="active">Nº Comprobante</label>
				</div>
				<div class="input-field col s12 m4">
					<!-- <textarea id="con" name="con" class="materialize-textarea" placeholder="Ejemplo: enero/2017" required autofocus></textarea> -->
					<select name="con[]" id="con" multiple onchange="actualizasaldo()" onselect="actualizasaldo()">
						<option value="" disabled>Seleccione...</option>
					</select>
					<label for="con">Concepto (Cuota a pagar)</label>
				</div>
			    <div class="input-field col s12 m2">
					<input type="number" name="mon" id="mon" min="0.00" step="0.01"  required>
					<label for="mon" class="active">Monto aportación ($)</label>
				</div>
				
				<input type="hidden" name="help" id="help" value="0">
			</div>
			<!-- </div> -->
			<!-- FINALIZAN ELEMENTOS DEL FORMULARIO **************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- FINALIZA EL BLOQUE DEL MODAL -->
<div class="modal modal-fixed-footer" id="modalAportacionV">
	<form id="formAportacionV">
		<div class="modal-content" id="modalcontent">
			<h5>Aportación Voluntaria</h5>
			<div class="row">
				<div class="input-field col s12 m6">
					<input type="number" name="vsal0" id="vsal0" readonly>
					<label for="vsal0" class="active">Saldo anterior ($)</label>
				</div>
				
				<div class="input-field col s12 m6">
					<input type="text" name="vsal" id="vsal" readonly>
					<label for="vsal" class="active">Nuevo saldo ($)</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m3">
					<input name="fec" id="fec" type="date" required value="<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d");?>">
					<label for="fec" class="active">Fecha de transacción</label>
				</div>
				<div class="input-field col s12 m3">
					<input type="text" name="compro" id="compro" maxlength="20">
					<label for="compro" class="active">Nº Comprobante</label>
				</div>
				<div class="input-field col s12 m4">
					<input type="date" id="vcon" name="vcon" required></input>
					<!-- <select name="con[]" id="con" multiple onchange="actualizasaldo()" onselect="actualizasaldo()">
						<option value="" disabled>Seleccione...</option>
					</select> -->
					<label for="vcon" class="active">Concepto (Cuota a pagar)</label>
				</div>
				

			    <div class="input-field col s12 m2">
					<input type="number" name="vmon" id="vmon" min="0.00" step="0.01"  required>
					<label for="vmon" class="active">Monto aportación ($)</label>
				</div>
				
				<input type="hidden" name="help" id="help" value="0">
			</div>
			<!-- </div> -->
			<!-- FINALIZAN ELEMENTOS DEL FORMULARIO **************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>


<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text" id="titulo2">Movimiento de la cuenta</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *******************************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/CuentaMovimiento.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="12" data-page-list="[3,6,12,24,36,48]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*
				    	<th data-field="cuentamovimiento_id" hidden="true" data-align="center">id</th> -->
				    	<th data-field="cuentamovimiento_comprobante" data-align="center">Nº Comprobante</th> 
				    	<th data-field="cuentamovimiento_fecha" data-align="center">Fecha de pago</th>
				    	<th data-field="cuentamovimiento_concepto" data-align="center">Concepto</th>
			            <th data-field="cuentamovimiento_deposito" data-align="center">Monto($)</th>  
			            <th data-field="cuentamovimiento_saldo" data-align="center">Saldo ($)</th>
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
		$('select').material_select();
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
				//$("#mon").val("");
				
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				//$('label').removeClass("active");
				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE **********************************************************************************

				//FINALIZA BLOQUE ANADIR CODIGO SEGUN SE NECESITE**************************************************************************************
			}
			
		});

		/*FINALIZA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('#tabla1').bootstrapTable('refresh',{url:'php/CuentaMovimiento.php?acc=getjsontabla&idcue='+idcuenta+''});
		document.getElementById('titulo2').innerHTML='Movimiento de la cuenta # '+idcuenta;

		// $("#con").on('keyup',function(){
		// 	actualizasaldo();
		// });
	});
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	$("#formulario").on(
		"submit", 
		function(e){
	    	e.preventDefault();
	    	var f = $(this);
	    	if(validarretiro()){
		    	var formData = new FormData(document.getElementById("formulario"));
		    	formData.append("idcue", idcuenta);
		    	if(document.getElementById("dep1").checked){//deposito
					formData.append("dep", $("#mon").val());
					formData.append("ret", "0.00");
				}
				else if(document.getElementById("ret1").checked){//retiro
					formData.append("dep", "0.00");
					formData.append("ret", $("#mon").val());
				}
		    	if($("#idid").val() == ""){ 
					formData.append("acc", "setAportacion");
				}
				else{
			    	formData.append("id", $("#idid").val());
			    	formData.append("acc", "edi");
				}
				$.ajax({
		            url: "php/CuentaMovimiento.php",
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
			        		$('#tabla1').bootstrapTable('refresh',{url:'php/CuentaMovimiento.php?acc=getjsontabla&idcue='+idcuenta+''});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
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
            '<a class="print ml10" href="javascript:void(0)" title="imprimir">',
                '<i class="material-icons">print</i>',
            '</a>&nbsp;',
            '<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
                '<i class="material-icons">mode_edit</i>',
            '</a>&nbsp;'
        ].join('');
    }
	/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
		/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .print': function (e, value, row, index) {
        	window.open('html/ReciboAportacion.php?idc='+idcuenta+'&idm='+JSON.stringify(row.cuentamovimiento_id).replace(/"/gi,''),'_blank');
        }, 

		/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
            $("#idid").val(JSON.stringify(row.cuentamovimiento_id).replace(/"/gi,''));
            $("#compro").val(JSON.stringify(row.cuentamovimiento_comprobante).replace(/"/gi,''));
           $("#fec").val(JSON.stringify(row.cuentamovimiento_fecha).replace(/"/gi,''));
           $('select').empty();
				var dep = $("#con");
	           dep.append("<option>"+JSON.stringify(row.cuentamovimiento_concepto)+"</option>");
           $('select').material_select();
           //$("#con").val(JSON.stringify(row.cuentamovimiento_concepto).replace(/"/gi,''));
           $("#mon").val(JSON.stringify(row.cuentamovimiento_deposito).replace(/"/gi,''));
            $("#help").val(JSON.stringify(row.cuentamovimiento_deposito).replace(/"/gi,''));
           // $("#ret").val(JSON.stringify(row.capital_retiro).replace(/"/gi,''));
            //$("#sal").val(JSON.stringify(row.capital_saldo).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        	//$('label').addClass("active");
        	$('#modal1').modal('open');
        	getsaldo();
        	
        }
		// /*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		// INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)
  //       'click .remove': function (e, value, row, index) {
  //       	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS*************************************/
  //           if(confirm("Realmente desea eliminar el registro del capital "+JSON.stringify(row.capital_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
  //           	datos = {
	 //            	id:JSON.stringify(row.tipocuenta_id).replace(/"/gi,''),
	 //            	acc:'del'
	 //            }
	 //            ejecutarajax(datos);
  //           }
  //           /*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
  //       },
		// /*FINALIZA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		// /*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
  //       'click .view': function (e, value, row, index) {
  //       	alert("sdfkhkj"); /********************************************************************************************************/          
  //       }
		// /*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
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
	        		$('#tabla1').bootstrapTable('refresh',{url:'php/CuentaMovimiento.php?acc=getjsontabla&idcue='+idcuenta+''});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
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
	        url: "php/CuentaMovimiento.php",
	        data:{acc:'getSaldoCuenta',idcue:idcuenta},
	        success:function(responseText){
	        	$("#sal0").val(responseText);
	        	$("#sal").val(responseText);
	        	//alert(responseText);
	        }
	    });
	}
	/*FINALIZA FUNCION PARA OBTENER DE LA BASE EL SALDO DE CAPITAL */
	/*Obtener el monto a pgar de las aportaciones*/
	function getMonto(){
		$.ajax({
	        type:"post",
	        url: "php/CuentaMovimiento.php",
	        data:{acc:'getMontoAportacion',idcue:idcuenta},
	        success:function(responseText){
	        	$("#mon").val(responseText);
	        }
	    });
	}
	/*INICIA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */
	function actualizasaldo(){
		//var auxi = parseFloat(JSON.stringify(row.cuentamovimiento_deposito));
		var cuotas = $('#con option:selected').length;
		var s0= parseFloat($("#sal0").val());
		if($("#mon").val()==''){
			m=0.0-parseFloat($("#help").val());
		}else{
			var m= parseFloat($("#mon").val())-parseFloat($("#help").val());
		}

		if(document.getElementById("dep1").checked){//deposito
			$("#sal").val( parseFloat(''+(s0+(m*cuotas))).toFixed(2) );
		}
		else if(document.getElementById("ret1").checked){//retiro
			$("#sal").val( parseFloat(''+(s0-(m*cuotas))).toFixed(2) );
		}
	}
	/*FINALIZA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */

	/*INICIA FUNCION PARA VALIDAR RETIRO DE CAPITAL */
	function validarretiro(){
		if(document.getElementById("ret1").checked){//retiro
			if( ($("#sal0").val()-$("#mon").val())<0 ){
				alert("No tiene fondos suficientes para retirar esa cantidad.");
				$("#mon").val("0.00");
				actualizasaldo();
				return false;
			}
		}
		return true;
	}
	/*FINALIZA FUNCION PARA VALIDAR RETIRO DE CAPITAL */


	function consultaAportacionesPagadas(){
		$.ajax({
	        type:"post",
	        url: "php/CuentaMovimiento.php",
	        data:{acc:'getUltimaCuotaPagada',idcue:idcuenta},
	        success:function(responseText){
	        	//alert(responseText);
	        	var aux=responseText.split("/");
	        	if(aux[0]=='Apertura de cuenta'){
	        		//var children = $("tr td")[1].innerHTML;
	        		//var fechaApertura= children.substring(100,110);//Obtengo la fecha de Apertura de cuenta desde la tabla
	        		var fecape=aux[1].split("-");
	        		var anioApe=fecape[0];
	        		var mesApe=fecape[1];
	        		
	        		cargaSelect(anioApe,mesApe-1,fecape[0]);

	        	}else{
	        		/*//alert(aux[0]);
	        		if (aux[0]=='Voluntaria')
	        		{
		        		$.ajax({
					        type:"post",
					        url: "php/CuentaMovimiento.php",
					        data:{acc:'getUltimaCuotaPagada2',idcue:idcuenta},
					        success:function(responseText){

					        }
					    });
		        	}
		        	else
		        	{*/
		        		var fec = aux[0].split("-");//desconpongo la fecha
		        		var anio= fec[0];//Obtengo el anio
		        		var mes = fec[1];//obtengo el ultimo mes pagado
		        		cargaSelect(anio,mes,fec[0]);
		        	
    				//$("#con option[value='"+responseText+"']").attr("selected",true);
	        	}
	        }
	    });
	}

	function cargaSelect(anio,mes,aniocons){
		var meses=["NaN","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
		$('select').empty();
		var dep = $("#con");
		dep.append("<option value='Voluntaria' >Aportación Voluntaria</option>");
		dep.append("<option value='Dividendos' >Distribución de Excedentes</option>");
		dep.append("<option value='Intereses' >Intereses sobre aportaciones</option>");
		//Carga 1 año para pagar aportaciones
		var i=1;
		var j=parseInt(mes);
		j++;	
		if(j>12)
			j=1;
		else
			j=j;

		while(i<=12){
			if(j<=parseInt(mes)){
				anio=parseInt(anio)+1;
				if(j<10)
					dep.append("<option value='"+anio+"-0"+j+"-01'>"+meses[j]+"/"+anio+"</option>");
				else
					dep.append("<option value='"+anio+"-"+j+"-01'>"+meses[j]+"/"+anio+"</option>");
				/*if(i<10)
					$("#con option[value='"+anio+"-0"+i+"-01']").attr('disabled','disabled');
				else
					$("#con option[value='"+anio+"-"+i+"-01']").attr('disabled','disabled');*/
				anio=parseInt(anio)-1;
			}else{
				if(j<10)
					dep.append("<option value='"+aniocons+"-0"+j+"-01'>"+meses[j]+"/"+aniocons+"</option>");
				else
					dep.append("<option value='"+aniocons+"-"+j+"-01'>"+meses[j]+"/"+aniocons+"</option>");
			}
			if(j>11){
				j=0;
				j++;
			}else{
				j++;
			}
			i++;
		}
		$('select').material_select();
		/*$('select').empty();
		var dep = $("#con");
		var ano = (new Date).getFullYear();
		dep.append("<option value='' disabled>Seleccione...</option>");
		dep.append("<option value='"+ano+"-01-01'>Enero/"+ano+"</option>");
		dep.append("<option value='"+ano+"-02-01'>Febrero/"+ano+"</option>");
		dep.append("<option value='"+ano+"-03-01'>Marzo/"+ano+"</option>");
		dep.append("<option value='"+ano+"-04-01'>Abril/"+ano+"</option>");
		dep.append("<option value='"+ano+"-05-01'>Mayo/"+ano+"</option>");
		dep.append("<option value='"+ano+"-06-01'>Junio/"+ano+"</option>");
		dep.append("<option value='"+ano+"-07-01'>Julio/"+ano+"</option>");
		dep.append("<option value='"+ano+"-08-01'>Agosto/"+ano+"</option>");
		dep.append("<option value='"+ano+"-09-01'>Septiembre/"+ano+"</option>");
		dep.append("<option value='"+ano+"-10-01'>Octubre/"+ano+"</option>");
		dep.append("<option value='"+ano+"-11-01'>Noviembre/"+ano+"</option>");
		dep.append("<option value='"+ano+"-12-01'>Diciembre/"+ano+"</option>");
		$('select').material_select();*/
	}
	/*INICIA EL BLOQUE DE LOS EVENTOS*/
	$(".actsal").change(function() { actualizasaldo(); });
	$("#mon").keyup(function() { actualizasaldo(); });
	$("#mon").blur(function(){ validarretiro(); });
	/*FINALIZA EL BLOQUE DE LOS EVENTOS*/
</script>
