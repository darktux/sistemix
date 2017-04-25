
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
		<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Asociado.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="3" data-page-list="[3,5,8,10,20,50,100]">
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
	<h4 class="center teal-text">Solicitudes de crédito</h4>
	<div class="row">
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO -->
			<table id="tabla2" data-toggle="table" class="table table-striped table-hover"  data-url="php/Credito.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
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
<!-- INICIA EL BLOQUE DEL MODAL NUEVA CUENTA -->
<div id="modal2" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Nueva solicitud de crédito</h5><!-- //TITULO DEL MODAL **********************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<ul id="tabs-swipe-demo" class="tabs swipeable">
				    <li class="tab col s3 "><a class="active teal-text waves-effect waves-teal" href="#personales"><i class="material-icons">contact_phone</i> Datos Personales</a></li>
				    <li class="tab col s3 " ><a  class="teal-text waves-effect waves-teal" href="#familiares" ><i class="material-icons">supervisor_account</i> Datos Familiares</a></li>
				    <li class="tab col s3 "><a class=" teal-text waves-effect waves-teal" href="#laborales"><i class="material-icons">business</i> Datos Laborales</a></li>
				    <li class="tab col s3 "><a class=" teal-text waves-effect waves-teal" href="#referencias"><i class="material-icons">assignment</i> Referencias</a></li>
	  			</ul>
				
				<div id="personales" class="col s12 white swipeable">
					<div class="row">
						<div class="input-field col s12"> 
				          <input id="nom" name="nom" type="text" class="validate" required autofocus="true">
				          <label id="lnom" for="nom">Nombre completo</label>
        				</div>
					</div>
					<div class="row">
						<div class="input-field col s3">
							<label for="sex">Sexo</label> 
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sex" type="radio" id="mas" checked />
								<label for="mas">Masculino</label> 	
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sex" type="radio" id="fem"  />	
								<label for="fem">Femenino</label>
						</div>
						<br><br><br>
					</div>
					<div class="row">
						<div class="input-field col s12">	
							<input id="fec" name="fec" type="date" class="datepicker" >
							<label for="fec" >Fecha de nacimiento</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12"> 
					         <input id="dui" name="dui" type="text"  minlength="10" maxlength="10">
					         <label for="dui">DUI</label>
        				</div>
        			</div>
        			<div class="row">
						<div class="input-field col s12">
							<input type="text" name="nit" id="nit" >
							<label for="nit">NIT</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
				          <textarea id="dir" name="dir" class="materialize-textarea"></textarea>
				          <label for="dir">Direcci&oacute;n</label>
					    </div>			    
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="pro" id="pro" >
							<label for="pro">Profesi&oacute;n u oficio</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<select class="" id="est" name="est">
						      <option value="" disabled selected>Seleccione un estado</option>
						      <option value="1">Option 1</option>
						      <option value="2">Option 2</option>
						      <option value="3">Option 3</option>
						    </select>
							<label for="est">Estado civil</label>
						</div>
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="tel" id="tel" >
							<label for="tel">Tel&eacute;fono fijo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="cel" id="cel" >
							<label for="cel">Tel&eacute;fono celular</label>
						</div>
					</div>						
				</div>

				<div id="familiares" class="col s12 white swipeable">
					<div class="row">
						<div class="input-field col s12"> 
				          <input id="nomc" name="nomc" type="text" class="validate" >
				          <label for="nomc">Nombre conyugue</label>
        				</div>
					</div>
					<div class="row">
						<div class="input-field col s3">
							<label for="sexc">Sexo conyugue</label> 
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sexc" type="radio" id="masc" checked />
								<label for="masc">Masculino</label> 	
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sexc" type="radio" id="femc"  />	
								<label for="femc">Femenino</label>
						</div>
						<br><br><br>
					</div>
					<div class="row">
						<div class="input-field col s12">	
							<input id="fecc" name="fecc" type="date" class="datepicker" >
							<label for="fecc" class="">Fecha de nacimiento conyugue</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12"> 
					         <input id="duic" name="duic" type="text"  minlength="10" maxlength="10">
					         <label for="duic">DUI conyugue</label>
        				</div>
        			</div>
        			<div class="row">
						<div class="input-field col s12">
							<input type="text" name="nitc" id="nitc" >
							<label for="nitc">NIT conyugue</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
				          <textarea id="dirc" name="dirc" class="materialize-textarea"></textarea>
				          <label for="dirc">Direcci&oacute;n conyugue</label>
					    </div>			    
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="proc" id="proc" >
							<label for="proc">Profesi&oacute;n u oficio conyugue</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<select class="" id="estc" name="estc">
						      <option value="" disabled selected>Seleccione un estado</option>
						      <option value="1">Option 1</option>
						      <option value="2">Option 2</option>
						      <option value="3">Option 3</option>
						    </select>
							<label for="estc">Estado civil conyugue</label>
						</div>
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="telc" id="telc" >
							<label for="telc">Tel&eacute;fono fijo conyugue</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="celc" id="celc" >
							<label for="celc">Tel&eacute;fono celular conyugue</label>
						</div>
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="lugc" id="lugc">
							<label for="lugc">Lugar de trabajo conyugue</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
				          	<textarea id="dirtc" name="dirtc" class="materialize-textarea"></textarea>
				          	<label for="dirtc">Direcci&oacute;n de trabajo conyugue</label>
					    </div>			    
					</div>
						
				</div>

	  			<div id="laborales" class="col s12 white swipeable">
	  				<div class="row">
						<div class="input-field col s12">
							<input type="text" name="lugt" id="lugt">
							<label for="lugt">Lugar de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="dirt" name="dirt" class="materialize-textarea"></textarea>
							<label for="dirt">Direcci&oacute;n de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="telt" id="telt">
							<label for="telt">Tel&eacute;fono de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="jefe" id="jefe">
							<label for="jefe">Jefe inmediato</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="pues" name="pues" class="materialize-textarea"></textarea>
							<label for="pues">Puesto de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="timet" id="timet">
							<label for="timet">Tiempo de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="suel" value="0.00" onchange="sumi()" id="suel" min="0.00">
							<label for="suel" class="active">Sueldo mensual</label>
						</div>			    
					</div>
					
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" value="0.00" name="otroi" id="otroi" onchange="sumi()" min="0.00" >
							<label class="active" for="otroi">Otros ingresos</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="text" name="toti" class='teal-text'  id="toti" disabled="true" value="0.00">
							<label for="toti" class="active">Total ingresos ($)</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="gasv" id="gasv" onchange="sume()" value="0.00" min="0.00">
							<label for="gasv" class="active">Gasto vida</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="pagd" id="pagd" onchange="sume()" value='0.00' min="0.00">
							<label for="pagd" class="active">Pago de deudas</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="otroe" id="otroe" onchange="sume()" value="0.0" min="0.00">
							<label for="otroe" class="active">Otros egresos</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" class='teal-text' name="tote" id="tote" value="0.00" disabled="true" min="0.00">
							<label for="tote" class="active">Total egresos</label>
						</div>			    
					</div>
	  			</div>
	  			
	  			<div id="referencias" class="col s12 white swipeable">
	  				<div class="row">
						<div class="input-field col s12"> 
				          	<input id="nomr" name="nomr" type="text" class="validate" autofocus="true">
				          	<label for="nomr">Nombre referencia</label>
        				</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="dirr" name="dirr" class="materialize-textarea"></textarea>
							<label for="dirr">Direcci&oacute;n de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="telr" id="telr">
							<label for="telr">Tel&eacute;fono fijo de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="celr" id="celr">
							<label for="celr">Celular de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="lugtr" name="lugtr" class="materialize-textarea"></textarea>
							<label for="lugtr">Lugar de trabajo de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="dirtr" name="dirtr" class="materialize-textarea"></textarea>
							<label for="dirtr">Direcci&oacute;n de trabajo de referencia</label>
						</div>
					</div>
	  			</div>		
	  		</div>
	  		 <div class="row center-align" style="margin: auto">
		  		<div class="col s12 center-align">		
					<ul id="tabs-swipe-demo" class="tabs swipeable">
					    <li class="tab col s3 "><a class="active teal-text waves-effect waves-teal" onclick="focuss(1);"><i class="material-icons">contact_phone</i>  </a></li>
					    <li class="tab col s3 "><a  class="teal-text waves-effect waves-teal"  onclick="focuss(2);"><i class="material-icons">supervisor_account</i>  </a></li>
					    <li class="tab col s3 "><a class=" teal-text waves-effect waves-teal" id="op3" onclick="focuss(3);"><i class="material-icons">business</i>  </a></li>
					    <li class="tab col s3 "><a class=" teal-text waves-effect waves-teal"  onclick="focuss(4);"><i class="material-icons">assignment</i> </a></li>
			  		</ul>
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
		$('.tooltipped').tooltip({delay: 50});
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: 1 //dias equivalentes  years restados for today
		});
		$('select').material_select('destroy');
		$('select').material_select();	
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

	    /*INICIA BLOQUE DE CONFIGURACION DEL MODAL BUSCAR */
		$('#modal1').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				document.getElementById("cueid").removeAttribute("readonly");
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
				document.getElementById("mon").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/
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
	function getnumber(){
		
		$("#cueid").val("01-");
		
		/*
		$.ajax({
	        type:"post",
	        url: "php/Cuenta.php",
	        data:{acc:'getNumeroCuenta'},
	        success:function(responseText){
	        	$("#cueid").val(responseText);
	        }
	    });
		*/

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
            '<a class="new ml10" href="javascript:void(0)" title="Nueva solicitud de crédito">',
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
        	$("#tit2").val(JSON.stringify(row.cuenta_asociadonombre).replace(/"/gi,''));

        	$("#fecape").val(JSON.stringify(row.cuenta_fechaapertura).replace(/"/gi,''));
        	$("#cueid").val(JSON.stringify(row.cuenta_id).replace(/"/gi,''));

        	$("#idid").val(JSON.stringify(row.cuenta_id).replace(/"/gi,''));
        	
            $("#mon").val(JSON.stringify(row.cuenta_monto).replace(/"/gi,''));

            $("#tipcueid").val(JSON.stringify(row.cuenta_tipocuentaid).replace(/"/gi,''));

            $("#est").val(JSON.stringify(row.cuenta_estado).replace(/"/gi,''));
            
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
        	getnumber();
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
        		$('#tabla1').bootstrapTable('refresh',{url:'php/Asociado.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
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
</script>