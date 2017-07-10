<?php  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Datos de solicitud de crédito</title>
	<link href="../../css/iconos.css" rel="stylesheet">
	<link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="shortcut icon" type="imgage/png" href="../../img/logos/logo.png">
</head>
<body>
	<form class="container col s12" id="formulario">
		<input id="idid" name="idid" type="hidden" value="<?php echo $_GET['id']; ?>">
		
		<div class="teal" id="">
			<br>
			<h5 align="center" class="white-text">Nueva solicitud de crédito</h5>
			<br>
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<span id="top"></span>
			<div class="row">
				<ul id="tabs-swipe-demo" class="tabs swipeable">
					
				    <li class="tab col s2 active"><a class="teal-text waves-effect waves-teal tooltipped" data-tooltip="Datos Personales" href="#personales"><i class="material-icons">person</i> </a></li>
				    <li class="tab col s2 " ><a  class="teal-text waves-effect waves-teal tooltipped" data-tooltip="Datos Familiares" href="#familiares" ><i class="material-icons">people</i> </a></li>
				    <li class="tab col s2 "><a class=" teal-text waves-effect waves-teal tooltipped" data-tooltip="Datos Laborales" href="#laborales"><i class="material-icons">domain</i> </a></li>
				    <li class="tab col s2 "><a class=" teal-text waves-effect waves-teal tooltipped" data-tooltip="Referencias" href="#referencias"><i class="material-icons">people_outline</i> </a></li>
				    <li class="tab col s2 "><a  class="teal-text waves-effect waves-teal tooltipped" data-tooltip="Datos del Crédito" href="#credito"><i class="material-icons">monetization_on</i> </a></li>
	  			</ul>
				
				<div id="personales" class="col s12 white swipeable">
					<div class="row">
						<div class="input-field col s12"> 
				          <input id="nom" name="nom" type="text" value="<?php echo $_GET['name']; ?>" readonly>
				          <label id="lnom" class="active"  for="nom">Nombre completo</label>
        				</div>
					</div>
					<div class="row">
						<div class="input-field col s3">
							<label for="sex">Sexo</label> 
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sex" type="radio" id="mas" value="M" checked />
								<label for="mas">Masculino</label> 	
						</div>
						<div class="input-field inline col s3">
								<input class="with-gap" name="sex" type="radio" id="fem" value="F" />	
								<label for="fem">Femenino</label>
						</div>
						<br><br><br>
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
							<input id="fecc" name="fecc" type="date" >
							<label for="fecc" class="active">Fecha de nacimiento conyugue</label>
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
								<option value="Soltero/a">Soltero/a</option>
								<option value="Casado/a" selected>Casado/a</option>
								<option value="Acompañado/a">Acompañado/a</option>
								<option value="Viudo/a">Viudo/a</option>
								<option value="Divorciado/a">Divorciado/a</option>
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
							<input type="number" name="suel" value="0.00" onkeyup="sumi()" id="suel" min="0.00">
							<label for="suel" class="active">Sueldo mensual ($)</label>
						</div>			    
					</div>
					
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" value="0.00" name="otroi" id="otroi" onchange="sumi()" min="0.00" >
							<label class="active" for="otroi">Otros ingresos ($)</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="toti" class='teal-text'  id="toti" readonly="true" value="0.00">
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
							<input type="number" class='teal-text' name="tote" id="tote" value="0.00" readonly="true" min="0.00">
							<label for="tote" class="active">Total egresos</label>
						</div>			    
					</div>
	  			</div>
	  			
	  			<div id="referencias" class="col s12 white swipeable">
					Referencia personal

	  				<div class="row">
						<div class="input-field col s12"> 
				          	<input id="nomr" name="nomr" type="text" class="validate">
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



					Referencia laboral


					<div class="row">
						<div class="input-field col s12"> 
				          	<input id="nomrlab" name="nomrlab" type="text" class="validate">
				          	<label for="nomrlab">Nombre referencia</label>
        				</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="dirrlab" name="dirrlab" class="materialize-textarea"></textarea>
							<label for="dirrlab">Direcci&oacute;n de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="telrlab" id="telrlab">
							<label for="telrlab">Tel&eacute;fono fijo de referencia</label>
					</div>
					</div>
					<div class22="row">
						<div class="input-field col s12">
							<input type="text" name="celrlab" id="celrlab">
							<label for="celrlab">Celular de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="lugtrlab" name="lugtrlab" class="materialize-textarea"></textarea>
							<label for="lugtrlab">Lugar de trabajo de referencia</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="dirtrlab" name="dirtrlab" class="materialize-textarea"></textarea>
							<label for="dirtrlab">Direcci&oacute;n de trabajo de referencia</label>
						</div>
					</div>
	  			</div>

				<div id="credito" class="col s12 white swipeable">
					<div class="row">
						<div class="input-field col s12">
						    <select class="" id="tipcreid" name="tipcreid" required onchange="calcular()" autocomplete="off">
						    	<option value="0" disabled selected>Seleccionar</option>
						    </select>
						    <label for="tipcreid">Tipos de crédito</label>
						</div>
						<div class="input-field col s12">
							<input type="number" name="mon" id="mon" value='0.00' min="0.00" onchange="calcular()" onkeyup="calcular()" required>
							<label for="mon" class="active">Monto del crédito ($)</label>
						</div>
						<div class="input-field col s12">
							<input type="number" name="pla" onchange="calcular()" onkeyup="calcular()"  id="pla" min="0" required>
							<label for="pla">Plazo del crédito (Meses)</label>
						</div>
						<div class="input-field col s12">
							<input type="number" name="cuo" class="teal-text" id="cuo" disabled="true" value="0.00" min="0.00" step="0.01" required>
							<label for="cuo" class="active">Cuota a pagar ($)</label>
						</div>
						<div class="input-field col s12">
							<input type="date" name="feccon" onchange="fechaf()" id="feccon" required>
							<label for="feccon" class="active">Fecha del contrato</label>
						</div>
						<div class="input-field col s12">
							<input type="date" name="fecpag" id="fecpag" required>
							<label for="fecpag" class="active">Fecha de pago</label>
						</div>
						<div class="input-field col s12">
							<input type="date" name="fecfin" id="fecfin" readonly  required>
							<label for="fecfin" class="active">Fecha aproximada de finalización del crédito</label>
						</div>
						<div class="input-field col s12">
							<select class="" id="est" name="est">
								<option value="0" disabled >Seleccionar</option>
								<option value="En espera">En espera</option>
						    	<option value="Activo">Activo</option>
						    	<option value="Congelado">Congelado</option>
						    	<option value="Cerrado">Cerrado</option>
						    </select>
							<label for="est">Estado</label>
						</div>
						
					</div>
				</div>
	
	  			<div class="chip">
				    <img src="../../img/fondo12.jpg" alt="Contact Person">
				    <a href="#top">Volver arriba</a>
				</div>		
	  		</div>
			<!-- FINALIZAN ELEMENTOS DEL FORMULARIO *****************************************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" onclick="window.close()" type="reset">Cancelar</button>
		</div>
	</form>
		


	<script src="../../js/jquery.js"></script>
	<script src="../../js/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="../../js/materialize.js"></script>
	<script>
		$(document).ready(function(){
			$('.indicator').addClass('teal');
			$("#tel").mask("9999-9999",{placeholder:" "});
			$("#cel").mask("9999-9999",{placeholder:" "});
			$("#duic").mask("99999999-9",{placeholder:" "});
			$("#nitc").mask("9999-999999-999-9",{placeholder:" "});
			$("#telc").mask("9999-9999",{placeholder:" "});
			$("#celc").mask("9999-9999",{placeholder:" "});
			$("#telr").mask("9999-9999",{placeholder:" "});
			$("#celr").mask("9999-9999",{placeholder:" "});
			$("#telrlab").mask("9999-9999",{placeholder:" "});
			$("#celrlab").mask("9999-9999",{placeholder:" "});
			$("#telt").mask("9999-9999",{placeholder:" "});
			$('.tooltipped').tooltip({delay: 50});
			
			$('select').material_select('destroy');
			$('select').material_select();


			$.ajax({
		        type:"post",
		        url: "../php/TipoCredito.php",
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
		});





		$("#formulario").on(
			"submit", 
			function(e){
		    	e.preventDefault();
		    	var f = $(this);
		    	var formData = new FormData(document.getElementById("formulario"));
		
		       	formData.append("acc", "addsol");
		
				$.ajax({
		            url: "../php/Credito.php",
		            type: "post",
		            dataType: "html",
		            data: formData,
		            cache: false,
		            contentType: false,
		     		processData: false,
		        	success:function(responseText){
		        		if(/Registro/.test(responseText)){
		        			alert(responseText);
		        			$("#formulario")[0].reset();
		        			window.close();
		        		}
		        		else{
		        			alert(responseText);
			        	}
		    	    }
		        });
			}	
		);






		function calcular()
		{
			if(!$('#mon').val()==0.0&&!$('#pla').val()==0.0&&!$('#tipcreid').val()==0)
			{ 
				$.ajax({
			        type:"post",
			        url: "../php/Credito.php",
			        data:{acc:'getcuota', monto:$('#mon').val(), tiempo:$('#pla').val(), credid:$('#tipcreid').val()},
			        success:function(responseText){
			        		//alert(responseText);
			        		$('#cuo').val(responseText);     	
			        }
		    	});
			}
			 if(!$('#feccon').val()==''){
			 	fechaf();
			 }
		}








		function fechaf()
		{
			if(!$('#pla').val()==0.0){
				//fecha=new Date();
			   // tiempo=fecha.getTime();
			    fecc=new Date($('#feccon').val());
			    //$('#feccon').val(fecc.getUTCDate()+"/"+(fecc.getUTCMonth()+1)+"/"+fecc.getUTCFullYear());
			    day=fecc.getUTCDate();
			    month=parseInt($('#pla').val())+(fecc.getUTCMonth()+1);
			    year=fecc.getUTCFullYear();
			
			    while(month>12){

			    	month=(month-12);
			    	year++;
			    }
			    //day++;
			    if(month==2&&day>28){
			    	day=28;
			    }

			    month = month.toString();
			    day = day.toString();

			    if (month.length < 2) month = '0' + month;
		  		if (day.length < 2) day = '0' + day;
		  		
		  		$('#fecfin').val(year+"-"+month+"-"+day);
			}
		}



		
	</script>
	<!-- <script src="../../js/init.js"></script> -->
</body>
</html>