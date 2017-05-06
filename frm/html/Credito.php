<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Credito</h4>
	<div class="row">
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Credito.php?acc=getjsontabla"lick-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter2" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
				    	<th data-field="credito_asociadonombre" data-align="center">Asociado</th>
				    	<th data-field="credito_asociadodui" data-align="center">dui</th>
			            <th data-field="credito_saldo" data-align="center">Saldo ($)</th>
			            <th data-field="credito_sigfechapago" data-align="center">Siguiente fecha de pago</th>
			            <th data-field="credito_tipocreditonombre" data-align="center">Tipo de credito</th>
			            <!-- FINALIZAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->
				    </tr>
			    </thead>
			</table>
		</div>
	</div>
</div>
<script src="../js/bootstrap-table.js"></script>
<!-- FINALIZA EL BLOQUE DE LA TABLA -->
<!-- INICIA EL BLOQUE DEL MODAL NUEVA CUENTA -->
<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Modificar crédito</h5><!-- //TITULO DEL MODAL **********************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<input id="asoid" type="hidden" value="">
				<div class="input-field col s12">
					<input type="text" name="tit" id="tit" readonly>
					<label for="tit" class="active">Titular del crédito</label>
				</div>
				<div class="input-field col s12" hidden>
					<input type="text" name="sol" id="sol" readonly>
					<label for="sol">Solicitud del credito</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="mon" id="mon" readonly>
					<label for="mon">Monto del crédito</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="cuo" id="cuo" readonly>
					<label for="cuo">Cuota mensual</label>
				</div>
				<div class="input-field col s12">
					<input name="feccon" id="feccon" type="date" class="" readonly>
					<label for="feccon" class="active">Fecha contrato</label>
				</div>
				<div class="input-field col s12">
					<input name="fecpag" id="fecpag" type="date" class="" readonly>
					<label for="fecpag" class="active">Fecha de pago</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="pla" id="pla" readonly>
					<label for="pla">Plazo</label>
				</div>
				<div class="input-field col s12">
					<input name="fecfin" id="fecfin" type="date" class="" readonly>
					<label for="fecfin" class="active">Fecha de Finalización</label>
				</div>
				<div class="input-field col s12">
				    <select class="" id="tipcreid" name="tipcreid" readonly  autocomplete="off" >
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="tipcreid" class="noactive">Tipos de credito</label>
				</div>
				<div class="input-field col s12">
				    <select class="" id="est" required  autocomplete="off">
				    	<option value="0" disabled >Seleccionar</option>
				    	<option value="En espera" selected>En espera</option>
				    	<option value="Activada" selected>Activo</option>
				    	<option value="Congelada">Congelado</option>
				    	<option value="Cerrada">Cerrado</option>
				    </select>
				    <label for="est" class="noactive">Estados</label>
				</div>
			</div>
			<!-- FINALIZAN ELEMENTOS DEL FORMULARIO *****************************************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- FINALIZA EL BLOQUE DEL MODAL NUEVA CUENTA-->
<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
	var idcuenta=0;
	/*INICIA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	$(document).ready(function(){
		$("#dui1").mask("99999999-9",{placeholder:" "});
		$("#nit1").mask("9999-999999-999-9",{placeholder:" "});
		$("#dui2").mask("99999999-9",{placeholder:" "});
		$("#nit2").mask("9999-999999-999-9",{placeholder:" "});
		$("#dui3").mask("99999999-9",{placeholder:" "});
		$("#nit3").mask("9999-999999-999-9",{placeholder:" "});
		$('.tooltipped').tooltip({delay: 50});
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: 1 //dias equivalentes  years restados for today
		});
		$('select').material_select('destroy');
		$('select').material_select();
		$('ul.tabs').tabs();
  		$('.indicator').addClass('teal');

  		cargaTipoCredito();


		/*INICIA BLOQUE DE CONFIGURACION DEL MODAL NUEVA CUENTA */
		$('#modal1').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				document.getElementById("est").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/
				$('#modalcontent').animate({scrollTop:0},{duration:"slow"});
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE *************************************************************************************************
				$("#tipcreid").val("Activada");
		        $('select').material_select('destroy');
		    	$('select').material_select();
				//FINALIZA BLOQUE ANADIR CODIGO SEGUN SE NECESITE******************************************************************************************************
			}
		});
		/*FINALIZA BLOQUE DE CONFIGURACION DEL MODAL NUEVA CUENTA */
	});   
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */

	/*INICIA FUNCION GETNUMBER PARA ACTUALIZAR NUMEROS DE CUENTA */
	function getnumber(coraso){
        $.ajax({
            type:"post",
            url: "php/Cuenta.php",
            data:{acc:'getNumeroCuenta',corasociado:coraso},
            success:function(responseText){
                $("#cueid").val(responseText);
            }
        });
    }
	/*FINALIZA FUNCION GETNUMBER PARA ACTUALIZAR NUMEROS DE CUENTA */

	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	$("#formulario").on(
		"submit", 
		function(e){
	    	e.preventDefault();
	    	var f = $(this);
	    	if(validarretiro()){
		    	var formData = new FormData(document.getElementById("formulario"));
		    	formData.append("idcue", idcuenta);

		    	if($("#idid").val() == ""){ 
					formData.append("acc", "set");
				}
				else{
			    	formData.append("id", $("#idid").val());
			    	formData.append("acc", "upd");
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
		}	
	);
	/*FINALIZA LA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	/*INICIA EL BLOQUE DEL BOTON NUEVA CUENTA DE LA TABLA ASOCIADOS*/
	function operateFormatter1(value, row, index) {
        return [
            '<a class="new ml10" href="javascript:void(0)" title="Nueva cuenta">',
                '<i class="material-icons">add</i>',
            '</a>'
        ].join('');
    }
/*FINALIZA EL BLOQUE DEL BOTON NUEVA CUENTA DE LA TABLA ASOCIADOS*/
/*INICIA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
	function operateFormatter2(value, row, index) {
        return [
        	'&nbsp;<a class="move ml10" href="javascript:void(0)" title="Transacción">',
                '<i class="material-icons">compare_arrows</i>',
            '</a>',
            '<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
                '<i class="material-icons">mode_edit</i>',
            '</a>',
            '&nbsp;<a class="remove ml10" href="javascript:void(0)" title="Eliminar">',
                '<i class="material-icons">delete</i>',
            '</a>',
            '<a class="view ml10" href="javascript:void(0)" title="Ver más">',
                '<i class="material-icons">info</i>',
            '</a>'
            
        ].join('');
    }
/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$("#idid").val(JSON.stringify(row.credito_id).replace(/"/gi,''));
        	$("#tit").val(JSON.stringify(row.credito_asociadonombre).replace(/"/gi,''));
        	$("#sol").val(JSON.stringify(row.credito_solicitudcreditoid).replace(/"/gi,''));
        	$("#mon").val(JSON.stringify(row.credito_monto).replace(/"/gi,''));
        	$("#cuo").val(JSON.stringify(row.credito_cuota).replace(/"/gi,''));
        	$("#feccon").val(JSON.stringify(row.credito_fechacontrato).replace(/"/gi,''));
        	$("#fecpag").val(JSON.stringify(row.credito_fechapago).replace(/"/gi,''));
        	$("#pla").val(JSON.stringify(row.credito_plazo).replace(/"/gi,''));
        	$("#fecfin").val(JSON.stringify(row.credito_fechafin).replace(/"/gi,''));
        	$("#tipcreid").val(JSON.stringify(row.credito_tipocreditoid).replace(/"/gi,''));
        	$("#est").val(JSON.stringify(row.credito_estado).replace(/"/gi,''));

            
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$('label').addClass("active");
        	$("input").prop('disabled', false);
        	$('select').material_select('destroy');
        	$('select').prop("disabled",false);
        	$('select').material_select();
        	$("textarea").prop('disabled', false);

        	$('.noactive').removeClass("active");
        	$('#modal1').modal('open');
        },
/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del credito "+JSON.stringify(row.credito_id).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.credito_id).replace(/"/gi,''),
	            	acc:'del'
	            }
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
	            ejecutarajax(datos);
            }
        },
/*FINALIZA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .move': function (e, value, row, index) {
        	idcredito=JSON.stringify(row.credito_id).replace(/"/gi,'');
        	fechaactu=JSON.stringify(row.credito_sigfechapago).replace(/"/gi,'');
        	$("#formularios").load('html/CreditoMovimiento.php');
        },
/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON NUEVA CUENTA (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .new': function (e, value, row, index) {
        	//alert("jajajaja"); /********************************************************************************************************/
        	$("#asoid").val(JSON.stringify(row.asociado_id).replace(/"/gi,''));
        	$("#tit").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
        	$("#tit2").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
        	getnumber( JSON.stringify(row.asociado_correlativo).replace(/"/gi,'') );
        	//$('label').addClass("active");
        	$('#modal2').modal('open');
        },
/*FINALIZA ACCION DEL BOTON NUEVA CUENTA (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		'click .view': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$("#idid").val(JSON.stringify(row.credito_id).replace(/"/gi,''));
        	$("#tit").val(JSON.stringify(row.credito_asociadonombre).replace(/"/gi,''));
        	$("#sol").val(JSON.stringify(row.credito_solicitudcreditoid).replace(/"/gi,''));
        	$("#mon").val(JSON.stringify(row.credito_monto).replace(/"/gi,''));
        	$("#cuo").val(JSON.stringify(row.credito_cuota).replace(/"/gi,''));
        	$("#feccon").val(JSON.stringify(row.credito_fechacontrato).replace(/"/gi,''));
        	$("#fecpag").val(JSON.stringify(row.credito_fechapago).replace(/"/gi,''));
        	$("#pla").val(JSON.stringify(row.credito_plazo).replace(/"/gi,''));
        	$("#fecfin").val(JSON.stringify(row.credito_fechafin).replace(/"/gi,''));
        	$("#tipcreid").val(JSON.stringify(row.credito_tipocreditoid).replace(/"/gi,''));
        	$("#est").val(JSON.stringify(row.credito_estado).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$('label').addClass("active");
        	$("input").prop('disabled', true);
        	$("#buscar1").prop('disabled', false);
        	$('select').material_select('destroy');
        	$('select').prop("disabled",true);
        	$('select').material_select();
        	$("textarea").prop('disabled', true);
        	$('.noactive').removeClass("active");
        	$('#modal1').modal('open');
        }
    };
/*FINALIZA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
function ejecutarajax(datos){
	$.ajax({
        type:"post",
        url: "php/Credito.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('.modal').modal('close');
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

function cargaTipoCredito(){
	$.ajax({
        type:"post",
        url: "php/TipoCredito.php",
        data:{acc:'getjsonselect'},
        success:function(responseText){
        	var obj = $.parseJSON(responseText);
        	$.each(obj, function(i,item){
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
}


</script>