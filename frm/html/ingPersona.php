<div class="container">
	<div class="card-panel teal">
		<h1 class="white-text center-align">Registro</h1>
	</div>
	<form class="col s12" id="formPersona" onsubmit="return ajax();">
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
				          <label for="nom">Nombre completo</label>
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
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="suelc" id="suelc" min="0.00">
							<label for="suelc">Sueldo mensual conyugue</label>
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
							<input type="text" name="jefe" id="jefe">
							<label for="jefe">Jefe inmediato</label>
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
							<textarea id="pues" name="pues" class="materialize-textarea"></textarea>
							<label for="pues">Puesto de trabajo</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="suel" id="suel" min="0.00">
							<label for="suel">Sueldo mensual</label>
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
							<input type="number" name="otroi" id="otroi" min="0.00">
							<label for="otroi">Otros ingresos</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="toti" id="toti" min="0.00">
							<label for="toti">Total ingresos</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="gasv" id="gasv" min="0.00">
							<label for="gasv">Gasto vida</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="pagd" id="pagd" min="0.00">
							<label for="pagd">Pago de deudas</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="otroe" id="otroe" min="0.00">
							<label for="otroe">Otros egresos</label>
						</div>			    
					</div>
					<div class="row">
						<div class="input-field col s12">			  		
							<input type="number" name="tote" id="tote" min="0.00">
							<label for="tote">Total egresos</label>
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
		  	<div class="row">
				<br>
			</div>
	  		<div class="row">
				<div class="col s12 center-align">		
					<button class="btn waves-effect waves-light" type="submit">Guardar <i class="material-icons right">save</i></button>
					<button class="btn waves-effect waves-light" type="reset">Cancelar <i class="material-icons right">delete</i></button>
				</div>
			</div>
			<div class="fixed-action-btn">
					<a class="btn-floating waves-effect waves-light btn-large cyan darken-1"><i class="large material-icons">search</i></a>
					<ul>
						<li><a title="Documento Único de Identidad" class="btn-floating blue">DUI</a></li>
						<li><a title="Número de Identificación Tributaria" class="btn-floating yellow">NIT</a></li>
						<li><a title="Nombre" class="btn-floating red">NOM</a></li>
						<li><a title="Apellido" class="btn-floating green">APE</a></li>
					</ul>
			</div>
		</div>
	</form>	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: -6570 //dias equivalentes a 18 years restados for today
		});

		$('select').material_select();
  		$('#dir').trigger('autoresize');
  		$('ul.tabs').tabs();
  		//$('ul.tabs').tabs('select_tab', 'tab_id');
  		$('.collapsible').collapsible();
  		
  		$('.carousel').carousel();
  		$('.indicator').addClass('teal');
  	});

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

	function prueba()
	{
		alert('hi bitch');
		$('ul.tabs').tabs('select_tab','op3');
		this.document.form.submit();
	}

	function ajax(){
		$.ajax({
  			type: 'POST',
			url: "php/ingPersona.php",
			data: $("#formPersona").serialize(),
			success: function(data){
				alert(data);
			}
		});
		return false;
	}
</script>