<div class="container">
	<div class="card-panel teal">
		<h1 class="white-text center-align">Registro de Asociado</h1>
	</div>
	<div class="card-panel">
		<div class="row">
			<!--form-->
			<form class="col s12" id="formAsociado" onsubmit="return ajax();">
				<div class="row">
					<div class="input-field col s12"> 
			          <input id="nom" name="nom" type="text" class="validate" required autofocus="true">
			          <label for="nom">Nombre completo</label>
    				</div>
    			</div>
    			<div class="row">
					<div class="input-field col s12 m6"> 
				         <input id="dui" name="dui" type="text"  minlength="10" maxlength="10">
				         <label for="dui">DUI</label>
    				</div>
    				<div class="input-field col s12 m6"> 
				         <input id="nit" name="nit" type="text"  minlength="10" maxlength="10">
				         <label for="nit">NIT</label>
    				</div>    				
    			</div>
    			<div class="row">
    				<div class="input-field col s12 m6">
    					<input id="ext" name="ext" type="text"></input>
    					<label for="ext">Lugar donde fue extendido el DUI</label>
    				</div>
					<div class="input-field col s12 m6">	
						<input id="fecdui" name="fecdui" type="date" class="datepicker" >
						<label for="fecdui" >Fecha de extensión de DUI</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">	
						<input id="lugnac" name="lugnac" type="text">
						<label for="lugnac" >Lugar de nacimiento</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">	
						<input id="fecnac" name="fecnac" type="date" class="datepicker" >
						<label for="fecnac" >Fecha de nacimiento</label>
					</div>
					<div class="input-field col s12 m6">	
						<input id="nac" name="nac" type="text" value="Savadoreño/a">
						<label for="nac" class="active" >Nacionalidad</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select class="" id="est" name="est">
							<option value="" disabled selected>Seleccione un estado</option>
							<option value="Soltero/a">Soltero/a</option>
							<option value="Casado/a">Casado/a</option>
							<option value="Divorciado/a">Divorciado/a</option>
							<option value="Viudo/a">Viudo/a</option>
							<option value="Divorciado/a">Divorciado/a</option>
						</select>
						<label for="est">Estado civil</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="dep" id="dep" onChange="cargarMunicipios('dep','mun')">
						</select>
						<label for="dep">Departamento</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select id="mun" name="mun">
						</select>
						<label for="mun">Municipio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="dir" name="dir" class="materialize-textarea"></textarea>
						<label for="dir" >Dirección</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">	
						<input id="prouof" name="prouof" type="text">
						<label for="prouof" >Profesión u oficio</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">	
						<input id="ingmen" name="ingmen" type="text">
						<label for="ingmen" >Ingreso mensual ($)</label>
					</div>
					<div class="input-field col s12 m6">
						<select class="" id="inst" name="inst">
							<option value="" disabled selected>Seleccione una institución</option>
						</select>
						<label for="inst">Institución de salud</label>
					</div>
				</div>
				

				<!-- <div>
					<h4>Beneficiarios</h4>
					<a class="btn-floating btn-small waves-effect waves-light teal" href="#!" onclick="addBen();"><i class="material-icons">add</i></a>
					<a class="btn-floating btn-small waves-effect waves-light" onclick="remBen();"><i class="material-icons">remove</i></a>
				</div> -->
				<div id="divBen">
					<!-- <table>
						<thead>
							<th>NOMBRE</th>
							<th>DIRECCIÓN</th>
							<th>PARENTESCO</th>
							<th>%</th>
							<th>Remover</th>
						</thead>
						<tbody>
							<tr>
								<td>Ilonka Obilinovic</td>
								<td>Mi casa</td>
								<td>Esposa de Angel</td>
								<td>50</td>
								<td><a class="btn-floating btn-small waves-effect waves-light red" onclick="remBen();"><i class="material-icons">remove</i></a></td>
							</tr>
							<tr>
								<td>Emma Watson</td>
								<td>Mi casa</td>
								<td>Esposa de Angel</td>
								<td>50</td>
								<td><a class="btn-floating waves-effect waves-light red" onclick="remBen();"><i class="material-icons">remove</i></a></td>
							</tr>
						</tbody>
					</table> -->
					<h5>Beneficiarios</h5>
					<div class="col s12">
						<ul class="tabs">
							<li class="tab col s3"><a href="#test1" class="active teal-text">1° Beneficiario</a></li>
							<li class="tab col s3"><a href="#test2" class="teal-text">2° Beneficiario</a></li>
							<li class="tab col s3"><a href="#test3" class="teal-text">3° Beneficiario</a></li>
							<li class="tab col s3"><a href="#test4" class="teal-text">4° Beneficiario</a></li>
						</ul>
					</div>
					<br><br>
					
					
					<div class="row" id="test1">
						
						
						<div class="input-field col s12 m6">
							<input id="nom1" name="nom1" type="text" class="validate"  autofocus="true">
				          	<label for="nom1">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m4"> 
				          	<input id="par1" name="par1" type="text" class="validate"  autofocus="true">
				          	<label for="par1">Parentesco</label>
	    				</div>
	    				<div class="input-field col s12 m2"> 
				          	<input id="por1" name="por1" type="number" class="validate"  autofocus="true">
				          	<label for="por1">%</label>
	    				</div>
	    				<div class="input-field col s12">
							<textarea id="dir1" name="dir1" class="materialize-textarea"></textarea>
							<label for="dir1" >Dirección</label>
						</div>
	    			</div>
	    			
	    			<div class="row" id="test2">
	    				
						<div class="input-field col s12 m6">
							<input id="nom2" name="nom2" type="text" class="validate"  autofocus="true">
				          	<label for="nom2">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m4"> 
				          	<input id="par2" name="par2" type="text" class="validate"  autofocus="true">
				          	<label for="par2">Parentesco</label>
	    				</div>
	    				<div class="input-field col s12 m2"> 
				          	<input id="por2" name="por2" type="number" class="validate"  autofocus="true">
				          	<label for="por2">%</label>
	    				</div>
	    				<div class="input-field col s12">
							<textarea id="dir2" name="dir2" class="materialize-textarea"></textarea>
							<label for="dir2" >Dirección</label>
						</div>
	    			</div>
	    			
	    			<div class="row" id="test3">
	    				
						<div class="input-field col s12 m6">
							<input id="nom3" name="nom3" type="text" class="validate"  autofocus="true">
				          	<label for="nom3">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m4"> 
				          	<input id="par3" name="par3" type="text" class="validate"  autofocus="true">
				          	<label for="par3">Parentesco</label>
	    				</div>
	    				<div class="input-field col s12 m2"> 
				          	<input id="por3" name="por3" type="number" class="validate"  autofocus="true">
				          	<label for="por3">%</label>
	    				</div>
	    				<div class="input-field col s12">
							<textarea id="dir3" name="dir3" class="materialize-textarea"></textarea>
							<label for="dir3" >Dirección</label>
						</div>
	    			</div>
	    		
	    			<div class="row" id="test4">
	    			
						<div class="input-field col s12 m6">
							<input id="nom4" name="nom4" type="text" class="validate"  autofocus="true">
				          	<label for="nom4">Nombre completo</label>
	    				</div>
						<div class="input-field col s12 m4"> 
				          	<input id="par4" name="par4" type="text" class="validate"  autofocus="true">
				          	<label for="par4">Parentesco</label>
	    				</div>
	    				<div class="input-field col s12 m2"> 
				          	<input id="por4" name="por4" type="number" class="validate"  autofocus="true">
				          	<label for="por4">%</label>
	    				</div>
	    				<div class="input-field col s12">
							<textarea id="dir4" name="dir4" class="materialize-textarea"></textarea>
							<label for="dir4" >Dirección</label>
						</div>
	    			</div>
	    			<div class="divider"></div>
				</div>


				<br><br><br>
				<!--action buttons-->
				<div class="col s12 right-align">
					<a href="#!" class="btn-flat waves-effect waves-light">Cancelar</a>
					<button class="btn modal-trigger waves-effect waves-light" type="submit">Guardar y generar solicitud </button>
				</div>
			</form>
			<!--end of form-->
		</div>
	</div>
</div>

<!-- <div id="modalBen" class="modal modal-fixed-footer">
	<div class="modal-content">
		<h4>Ingrese beneficiario/a</h4>
		<form>
			<div class="row">
				<div class="input-field col s12">	
					<input id="nomben" name="nomben" type="text" required>
					<label for="nomben" >Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">	
					<input id="dirben" name="dirben" type="text">
					<label for="dirben" >Dirección</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">	
					<input id="parben" name="parben" type="text">
					<label for="parben" >Parentesco</label>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat teal white-text">Aceptar</a>
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
	</div>
</div> -->

<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: -6570 //dias equivalentes a 18 years restados for today
		});
  		$('#dir').trigger('autoresize');
  		cargarDepartamentos("dep");
		cargarMunicipios("dep","mun");
		cargarInstituciones();
  		$('select').material_select();
  		$('ul.tabs').tabs();
  		$('.indicator').addClass('teal');
  		//$(".modal").modal();
  	});

  	function addBen(){
  		var maxInputs = 4;
  		var contenedor= $("#divBen");
  		var x = $("#divBen div").length+1;
  		var fieldCount = x-1;

  		if(x<=maxInputs){
  			fieldCount++;
  			$(contenedor).append('<div><input type="text"></div>');
  		}
  	}

  	function ajax(){
		$.ajax({
            type:"post",
            url: "php/ingAsociado.php",
            data: $("#formAsociado").serialize(),
            success:function(responseText){
            	if(/Registro/.test(responseText)){
	        		alert(responseText);
	        		$("#formAsociado")[0].reset();
	        	}
	        	else{
	        		alert(responseText);
	        	}
            }
	    });    
    	return false;
	}

	function cargarInstituciones(){
		$.ajax({
			type:"post",
			url: "php/busInstituciones.php",
			data:{caso:'bus'},
			success:function(data){
				var obj = $.parseJSON(data);
				$.each(obj,function(i,item){
					var x = document.getElementById('inst');
					var option = document.createElement("option");
					option.value = item.institucionsalud_id;
					option.text = item.institucionsalud_nombre;
					x.add(option);
				});
				$("#inst").material_select('destroy');
				$("#inst").material_select();
			}
		});
	}
</script>
<script src="js/funciones.js"></script>