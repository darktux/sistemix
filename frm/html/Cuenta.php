
<!-- INICIA EL BLOQUE DEL BOTON PARA EL MODAL BUSCAR -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Buscar asociado"><i class="large material-icons">search</i></a>
</div>
<!-- FINALIZA EL BLOQUE DEL BOTON PARA EL MODAL BUSCAR -->
<!-- INICIA EL BLOQUE DEL MODAL BUSCAR -->
<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
<div id="modal1" class="modal modal-fixed-footer">
	<div class="modal-content" id="modalcontent">
		<h5>Buscar asociado</h5><!-- //TITULO DEL MODAL **********************************************************************************************************-->
		<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Asociado.php?acc=getjsontablaactivo" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="3" data-page-list="[3,5,8,10,20,50,100]">
		    <thead>
			    <tr>
			    	<th data-field="operate" data-align="center" data-formatter="operateFormatter1" data-events="operateEvents">Acciones</th>
			    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
		            <th data-field="asociado_nombre" data-align="center">Nombre</th>
		            <th data-field="asociado_dui" data-align="center">DUI</th>
		            <th data-field="asociado_nit" data-align="center">NIT</th>
		            <!-- FINALIZAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->
			    </tr>
		    </thead>
		</table>
	</div>
	<div class="modal-footer">
		<button class="waves-effect waves-light btn" type="submit">Guardar</button>
		<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
	</div>
</div>
<!-- FINALIZA EL BLOQUE DEL MODAL BUSCAR -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Cuenta</h4>
	<div class="row">
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla2" data-toggle="table" class="table table-striped table-hover"  data-url="php/Cuenta.php?acc=getjsontabla"lick-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter2" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
				    	<th data-field="cuenta_id" data-align="center"># Cuenta</th>
				    	<th data-field="cuenta_asociadonombre" data-align="center">Asociado</th>
			            <th data-field="cuenta_saldo" data-align="center">Saldo ($)</th>
			            <!-- <th data-field="cuenta_fechaapertura" data-align="center">Fecha de apertura</th> -->
			            <th data-field="cuenta_estado" data-align="center">Estado</th>
			            <th data-field="cuenta_tipocuentanombre" data-align="center">Tipo de cuenta</th>
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
<div id="modal2" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Nueva cuenta</h5><!-- //TITULO DEL MODAL **********************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<input id="asoid" type="hidden" value="">
				<div class="input-field col s12">
					<input type="text" name="tit" id="tit" readonly>
					<label for="tit" class="active">Titular de la cuenta</label>
				</div>
				<div class="input-field col s12" hidden>
					<input type="text" name="tit2" id="tit2" readonly>
					<label for="tit2">Co-titular de la cuenta</label>
				</div>
				<div class="input-field col s12">
					<input name="fecape" id="fecape" type="date" class="datepicker" required value="<?php date_default_timezone_set('America/El_Salvador'); echo date("Y-m-d");?>">
					<label for="fecape" class="active">Fecha de apertura</label>
				</div>
				<div class="input-field col s12">
				    <select class="" id="tipcueid" name="tipcueid" required  autocomplete="off" >
				    	<option value="0" disabled selected>Seleccionar</option>
				    </select>
				    <label for="tipcueid">Tipos de cuenta</label>
				</div>
				<div class="input-field col s12">
					<input readonly type="text" name="cueid" id="cueid" >
					<label for="cueid" class="active">N° de cuenta</label>
				</div>
				
				<div class="input-field col s12">
					<input type="number" name="mon" id="mon" required min="0.00" step="0.01">
					<label for="mon">Monto de apertura</label>
				</div>
				<div class="input-field col s12">
				    <select class="" id="est" required  autocomplete="off">
				    	<option value="0" disabled >Seleccionar</option>
				    	<option value="Activada" selected>Activada</option>
				    	<option value="Congelada">Congelada</option>
				    	<option value="Cerrada">Cerrada</option>
				    </select>
				    <label for="est">Estados</label>
				</div>
				<div id="autorizados">
					<h5>Autorizados para sacar fondos de la cuenta</h5>
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s4"><a href="#test1" class="teal-text">1° Autorizado</a></li>
							<li class="tab col s4"><a href="#test2" class="teal-text">2° Autorizado</a></li>
							<li class="tab col s4"><a href="#test3" class="teal-text">3° Autorizado</a></li>
						</ul>
					</div>
					<br><br>
					<div class="row" id="test1">
						<div class="input-field col s12 m12">
							<input id="nom1" name="nom1" type="text" class="validate" >
				          	<label for="nom1">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m6"> 
				          	<input id="dui1" name="dui1" type="text" class="validate" >
				          	<label for="dui1">DUI</label>
	    				</div>
	    				<div class="input-field col s12 m6"> 
				          	<input id="nit1" name="nit1" type="text" class="validate" >
				          	<label for="nit1">NIT</label>
	    				</div>	    			
	    			</div>
	    			<div class="row" id="test2">
						<div class="input-field col s12 m12">
							<input id="nom2" name="nom2" type="text" class="validate" >
				          	<label for="nom2">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m6"> 
				          	<input id="dui2" name="dui2" type="text" class="validate" >
				          	<label for="dui2">DUI</label>
	    				</div>
	    				<div class="input-field col s12 m6"> 
				          	<input id="nit2" name="nit2" type="text" class="validate" >
				          	<label for="nit2">NIT</label>
	    				</div>	    			
	    			</div>
	    			<div class="row" id="test3">
						<div class="input-field col s12 m12">
							<input id="nom3" name="nom3" type="text" class="validate" >
				          	<label for="nom3">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m6"> 
				          	<input id="dui3" name="dui3" type="text" class="validate" >
				          	<label for="dui3">DUI</label>
	    				</div>
	    				<div class="input-field col s12 m6"> 
				          	<input id="nit3" name="nit3" type="text" class="validate" >
				          	<label for="nit3">NIT</label>
	    				</div>	    			
	    			</div>
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

  		cargaTipoCuenta();

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
		/*INICIA BLOQUE DE CONFIGURACION DEL MODAL NUEVA CUENTA */
		$('#modal2').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				document.getElementById("tipcueid").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/
				$('#modalcontent').animate({scrollTop:0},{duration:"slow"});
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE *************************************************************************************************
				$("#tipcueid").val("Activada");
		        $('select').material_select('destroy');
		    	$('select').material_select();
				//FINALIZA BLOQUE ANADIR CODIGO SEGUN SE NECESITE******************************************************************************************************
				$('#modal1').modal('close');
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

	/*INICIA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
	function submit1(){
		if($("#idid").val() == ""){/*DATOS PARA CREAR NUEVO REGISTRO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *************************************************/
	            datos = {
	            	cueid:$("#cueid").val(),
	            	asoid:$("#asoid").val(),
	            	fecape:$("#fecape").val(),
	            	mon:$("#mon").val(),
	            	tipcueid:$("#tipcueid").val(),
	            	est:$("#est").val(),
	            	nom1:$("#nom1").val(),
	            	dui1:$("#dui1").val(),
	            	nit1:$("#nit1").val(),
	            	nom2:$("#nom2").val(),
	            	dui2:$("#dui2").val(),
	            	nit2:$("#nit2").val(),
	            	nom3:$("#nom3").val(),
	            	dui3:$("#dui3").val(),
	            	nit3:$("#nit3").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	fecape:$("#fecape").val(),
	            	mon:$("#mon").val(),
	            	tipcueid:$("#tipcueid").val(),
	            	est:$("#est").val(),
	            	nom1:$("#nom1").val(),
	            	dui1:$("#dui1").val(),
	            	nit1:$("#nit1").val(),
	            	nom2:$("#nom2").val(),
	            	dui2:$("#dui2").val(),
	            	nit2:$("#nit2").val(),
	            	nom3:$("#nom3").val(),
	            	dui3:$("#dui3").val(),
	            	nit3:$("#nit3").val(),
	            	acc:'upd'
	            }
		}
		/*DATOS PARA MODIFICAR UN REGISTRO (FIN DEL BLOQUE) ********************************************************************************************************/
		ejecutarajax(datos);
    	return false;
	}
	/*FINALIZA LA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
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
            '&nbsp;<a class="imprimir ml10" href="javascript:void(0)" title="Imprimir">',
                '<i class="material-icons">print</i>',
            '</a>'
            
        ].join('');
    }
/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR, ELIMINAR Y VER DE LA TABLA CUENTAS*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$("#tit").val(JSON.stringify(row.cuenta_asociadonombre).replace(/"/gi,''));
        	//Poner al primero de los autorizados
        	//$("#tit2").val(JSON.stringify(row.cuenta_asociadonombre).replace(/"/gi,''));
        	$("#fecape").val(JSON.stringify(row.cuenta_fechaapertura).replace(/"/gi,''));
        	$("#tipcueid").val(JSON.stringify(row.cuenta_tipocuentaid).replace(/"/gi,''));
        	$("#cueid").val(JSON.stringify(row.cuenta_id).replace(/"/gi,''));
        	//$("#mon").val(JSON.stringify(row.cuenta_monto).replace(/"/gi,''));
        	//$("#est").val(JSON.stringify(row.cuenta_estado).replace(/"/gi,''));
        	//$("#idid").val(JSON.stringify(row.cuenta_id).replace(/"/gi,''));
 			/*$.ajax({
		        type:"post",
		        url: "php/Cuenta.php",
		        data:{cuentaid:JSON.stringify(row.cuenta_id).replace(/"/gi,''),acc:"getAutorizados"},
		        success:function(data){
		        	alert(data);
		        	var dataJson=eval(data);
		        	for(var i in dataJson){
		        		alert(dataJson[i].nombre);
		        	}
		        }
		    });*/
            
            
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$('select').material_select('destroy');
		    $('select').material_select();
		    document.getElementById("cueid").setAttribute("readonly", "");
        	//$('label').addClass("active");
        	$('#modal2').modal('open');
        },
/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro de la cuenta "+JSON.stringify(row.cuenta_id).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.cuenta_id).replace(/"/gi,''),
	            	acc:'del'
	            }
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
	            ejecutarajax(datos);
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
        	//alert("jajajaja"); /********************************************************************************************************/
        	$("#asoid").val(JSON.stringify(row.asociado_id).replace(/"/gi,''));
        	$("#tit").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
        	$("#tit2").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
        	getnumber( JSON.stringify(row.asociado_correlativo).replace(/"/gi,'') );
        	//$('label').addClass("active");
        	$('#modal2').modal('open');
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
        		$('#tabla1').bootstrapTable('refresh',{url:'php/Asociado.php?acc=getjsontablaactivo'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
        		$('#tabla2').bootstrapTable('refresh',{url:'php/Cuenta.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
        		document.getElementById("buscar1").focus();
				$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
        	}
        	else{
        		alert(responseText);
        	}
        }
    });
}

function cargaTipoCuenta(){
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
}


$("#tipcueid").change(function() {
        $.ajax({
            type:"post",
            url: "php/Cuenta.php",
            data:{acc:'getNumeroCuenta2',tipcueid:$("#tipcueid").val()},
            success:function(responseText){
                var part = $('#cueid').val().split("-")
                $("#cueid").val(part[0]+'-'+responseText+'-'+part[2]);
            }
        });
    });
</script>