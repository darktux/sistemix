
<!-- INICIA EL BLOQUE DEL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Buscar Asociado"><i class="large material-icons">search</i></a>
</div>













































<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">





























			<h5>Nueva solicitud de credito</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="card-panel">
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
			  	
				<div class="fixed-action-btn">
						<a class="btn-floating waves-effect waves-light btn-large cyan darken-1"><i class="large material-icons">search</i></a>
						<ul>
							<li><a href="#modalBuscarPersona" onclick="bus(1)" class="btn-floating tooltipped blue" data-tooltip="Documento Único de Identidad">DUI</a></li>
							<li><a href="#modalBuscarPersona" onclick="bus(2)" class="btn-floating tooltipped yellow" data-tooltip="Número de Identificación Tributaria">NIT</a></li>
							<li><a href="#modalBuscarPersona" onclick="bus(3)" class="btn-floating tooltipped red" data-tooltip="Nombre de la persona">NOM</a></li>
						</ul>
					</div>
			</div>
			<input type="hidden" name="auxx" id="auxx" value="0">
			<input type="hidden" name="cod" id="cod">
			<!-- TERMINAN ELEMENTOS DEL FORMULARIO ********************************************************************************************************************************************************-->





























		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- TERMINA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE DEL MODAL2 -->
<div class="modal modal-fixed-footer" id="modalBuscarPersona">
	<div class="modal-content">

		<div class="row">
			<div class="col s12">
				<table class="striped s11" id="tdatos">
					<thead>
						<th>DUI</th>
						<th>Nombre</th>
						<th>NIT</th>
						<th>SELECCIONAR</th>
					</thead>
					<tbody id="contain">
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="height: 110px">
		<div class="container">
			<br>
			<div class="input-field col s11">
				<input type="text" name="bus"  id="bus" onkeyup = "if(event.keyCode == 13) bus(4)">
				<label for="bus" id="labelBus"></label>
			</div>
			<div class="input-field col s1">
				<a class="btn-floating waves-effect waves-light btn tooltipped cyan darken-1" onclick="bus(4)" data-tooltip="Buscar"><i class="large material-icons">search</i></a>
			</div>
		</div>
	</div>
</div>
<!-- TERMINA EL BLOQUE DEL MODAL2 -->
<!-- INICIA EL BLOQUE LA TABLA -->

<div class="container">
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">





	<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/SolicitudCredito.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">




			
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>









































				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="tipocuenta_nombre" data-align="center">Nombre</th>
			            <th data-field="tipocuenta_interes" data-align="center">Tasa de interés</th>
			            <th data-field="tipocuenta_montominimo" data-align="center">Monto mínimo</th>
			            <th data-field="tipocuenta_cobromontominimo" data-align="center">Cobro monto máximo</th>
			            <th data-field="tipocuenta_montoapertura" data-align="center">Monto de apertura</th>
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
		$('.tooltipped').tooltip({delay: 50});
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: -6570 //dias equivalentes a 18 years restados for today
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

					$('#bus').focus();
		        console.log(modal, trigger);
		      $('#modalcontent').animate({scrollTop:0},{duration:"slow"});
























































































				
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				$('label').removeClass("active");
				$('#tdatos tbody tr').remove(); $('#bus').val('');















































				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE *************************************************************************************************

				//TERMINA BLOQUE ANADIR CODIGO SEGUN SE NECESITE******************************************************************************************************












































			}
		});
/*FINALIZA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('select').material_select();
  		$('#dir').trigger('autoresize');
  		$('ul.tabs').tabs();
  		//$('ul.tabs').tabs('select_tab', 'tab_id');
  		$('.collapsible').collapsible();
  		
  		$('.carousel').carousel();
  		$('.indicator').addClass('teal');
	});
/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
function focuss(x)
	{
		if(x==1)
		{
			$('body,html').animate({scrollTop : 0}, 500);
			$('ul.tabs').tabs('select_tab','personales');
		}
		if(x==2)
		{
			$('body,html').animate({scrollTop : 0}, 500);
			$('ul.tabs').tabs('select_tab','familiares');

		}
		if(x==3)
		{
			$('body,html').animate({scrollTop : 0}, 500);
			$('ul.tabs').tabs('select_tab','laborales');
		}
		if(x==4)
		{
			$('body,html').animate({scrollTop : 0}, 500);
			$('ul.tabs').tabs('select_tab','referencias');
		}
	}

	function sumi()
		{
			$('#toti').val(parseFloat($('#suel').val())+parseFloat($('#otroi').val()));
		}

	function sume()
		{
			$('#tote').val(parseFloat($('#gasv').val())+parseFloat($('#pagd').val())+parseFloat($('#otroe').val()));
		}


	function bus(x){
		if(x==1)
		{
			$('#labelBus').text('Ingrese el número de DUI a buscar');
			$("#bus").mask("99999999-9");
			$("#auxx").val('1');
		}
		if(x==2)
		{
			$('#labelBus').text('Ingrese el número de NIT a buscar');
			$("#bus").mask("9999-999999-999-9");
			$("#auxx").val('2');
		}
		if(x==3)
		{
			$('#labelBus').text('Nombre de la persona a buscar');
			$("#auxx").val('3');

		}
		if(x==4)
		{
			if ($("#bus").val()!="") {
				$("#contain").load("php/SolicitudCredito.php",{field:$("#bus").val(),acc:'busca',aux:$('#auxx').val()},function(responseText,textStatus,XMLHttpRequest){
					if (textStatus=="success") {
						if (responseText=="") {
							alert("No encontrado");
						}
					};
				});
			}else{
				alert("Ingrese un parámetro de búsqueda");
			}
		}
	}
/*INICIA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
	function submit1(){




























		if($("#idid").val() == ""){/*DATOS PARA CREAR NUEVO REGISTRO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *************************************************/
	            datos = {
	            	nom:$("#nom").val(),
	            	int:$("#int").val(),
	            	monmin:$("#monmin").val(),
	            	cobmonmin:$("#cobmonmin").val(),
	            	monape:$("#monape").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	nom:$("#nom").val(),
	            	int:$("#int").val(),
	            	monmin:$("#monmin").val(),
	            	cobmonmin:$("#cobmonmin").val(),
	            	monape:$("#monape").val(),
	            	acc:'upd'
	            }
		}



























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
            $("#idid").val(JSON.stringify(row.tipocuenta_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.tipocuenta_nombre).replace(/"/gi,''));
            $("#int").val(JSON.stringify(row.tipocuenta_interes).replace(/"/gi,''));
            $("#monmin").val(JSON.stringify(row.tipocuenta_montominimo).replace(/"/gi,''));
            $("#cobmonmin").val(JSON.stringify(row.tipocuenta_cobromontominimo).replace(/"/gi,''));
            $("#monape").val(JSON.stringify(row.tipocuenta_montoapertura).replace(/"/gi,''));
            
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/







































        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {










































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del tipo de credito "+JSON.stringify(row.tipocuenta_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.tipocuenta_id).replace(/"/gi,''),
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
















































        url: "php/SolicitudCredito.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        















































        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('#modal1').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();

















































        		$('#tabla1').bootstrapTable('refresh',{url:'php/SolicitudCredito.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/















































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
