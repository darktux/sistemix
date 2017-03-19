<div class="container">
	<div class="card-panel teal">
		<h1 class="white-text center-align">Movimiento de la cuenta</h1>
	</div>
	<div class="card-panel">
		<div class="row">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="nom" id="nom" disabled>
						<label for="nom">Nombre completo</label>
					</div>
				</div>
				<div class="row">	
					<div class="input-field col s12">
						<input type="text" name="sal" id="sal" value="1000" disabled>
						<label class="active" for="sal">Saldo disponible($)</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m4">
						<label>Tipo de transacción</label>
					</div>
					<div class="col s12 m4">
				    	<input type="radio" name="radiopago" id="dep" class="with-gap" checked />
				    	<label for="dep">Depósito</label>
					</div>
					<div class="col s12 m4">
				    	<input type="radio" name="radiopago" id="ret" class="with-gap"/>
				    	<label for="ret">Retiro</label>
				    </div>
				    <br>
				</div>
				<div class="row">
				    <div class="input-field col s12">
				    	<br>
				    	<input type="text" name="pag" id="pag">
						<label for="pag">Monto ($)</label>
				    </div>
				</div>			
				<div class="row">
					<div class="col s12 center-align">
						<a class="btn waves-effect waves-light">Guardar <i class="material-icons right">save</i></a>
						<a href="#!" class="btn waves-effect waves-light">Cancelar <i class="material-icons right">delete</i></a>
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
				
			</form>
		</div>
	</div>
</div>


<!--Modal to search-->
<div class="modal modal-fixed-footer" id="modalBuscarPersona">
	<div class="modal-content">

		<div class="row">
			<div class="col s12">
				<table class="striped s11">
					<thead>
						<th>DUI</th>
						<th>Nombre</th>
						<th>NIT</th>
					</thead>
					<tbody>
						<tr>
							<td>04217742-9</td>
							<td>Angel Alberto Hernandez Vasquez</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>
						<tr>
							<td>04217742-9</td>
							<td>Alberto Castaneda</td>
							<td>0614-250989-117-7</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal-footer" style="height: 110px">
		<div class="container">
			<br>
			<div class="input-field col s11">
				<input type="text" name="bus" id="bus">
				<label for="bus" id="labelBus"></label>
			</div>
			<div class="input-field col s1">
				<a class="btn-floating waves-effect waves-light btn tooltipped cyan darken-1" data-tooltip="Buscar"><i class="large material-icons">search</i></a>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
	    $('select').material_select();
	    $('.datepicker').pickadate({
	    	selectMonth: true
	    });
	    $('.modal').modal();
	    $('.tooltipped').tooltip({delay: 50});
	  });
	function bus(x){
		if(x==1)
			$('#labelBus').text('Ingrese el número de DUI a buscar');
		if(x==2)
			$('#labelBus').text('Ingrese el número de NIT a buscar');
		if(x==3)
			$('#labelBus').text('Nombre de la persona a buscar');
	}
</script>