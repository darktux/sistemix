
<!-- FINALIZA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Calculadora de Creditos</h4>
	<br>
	<form id="formulario">
		<div class="row">
			<div class="input-field col s2"> 
				<input id="monto" name="monto" type="number" class="validate" min="1.00" step="0.01" required autofocus="true">
				<label id="lmonto" for="monto">Monto ($)</label>
	        </div>
	        <div class="input-field col s2"> 
				<input id="tiempo" name="tiempo" type="number" class="validate" required autofocus="true">
				<label id="ltiempo" for="tiempo">Tiempo (Meses)</label>
	        </div>
	        <div class="input-field col s2"> 
				<input id="interes" name="interes" type="number" class="validate" required min="1.00" max="100.00" step="0.01" autofocus="true">
				<label id="linteres" for="interes">Interes anual (%)</label>
	        </div>
	        <div class="input-field col s2"> 
				<input  name="fec" type="date"  required  autofocus="true">
				<label id="lfec" class="active" for="fec">Fecha inicio</label>
	        </div>
	         <div class="input-field col s2"> 
				<button class="waves-effect waves-light btn" type="submit">Calcular</button>
				<input type="hidden" name="acc" value="calc">
				
	        </div>
	       
	        
		</div>	
		 <div class="row">
		    <div class="col s12">
		      <div class="row" id="oculto" hidden="true">
		        <div class="input-field col s6">
		          <i class="material-icons prefix teal-text">person_pin</i>
		          <input type="text" id="autocomplete-input" class="autocomplete">
		          <label for="autocomplete-input">Asociado</label>
		        </div>
		        <div class="input-field col s2" > 
					<button  class="print ml10 btn" onclick="imprimirReporte()" title="imprimir">
	                	<i class="material-icons">print</i> 
	           		</button>
	        	</div>
		      </div>
		    </div>
		  </div>
	</form>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *******************************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-click-to-select="true"  data-show-refresh="true"  data-pagination="false" data-page-size="100" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<!-- <th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th> -->
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*-->
				    	<th data-field="calculos_id" data-align="center">Fecha || Cuota #</th>
			            <th data-field="calculos_cuota" data-align="center">Cuota Mensual ($)</th>
			            <th data-field="calculos_amortizacion" data-align="center">Amortización ($)</th>
			            <th data-field="calculos_intereses" data-align="center">Intereses ($)</th>
			            <th data-field="calculos_monto" data-align="center">Monto ($)</th>
			          
			            <!-- FINALIZAN ELEMENTOS DE LA TABLA ****************************************************************************************-->
				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
		<script src="../js/sum.js"></script>
	</div>
</div>
<!-- FINALIZA EL BLOQUE DE LA TABLA -->
<!-- INICIA EL BLOQUE JAVASCRIPT -->
<script type="text/javascript">
$('#fec').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			//max: true, //dias equivalentes a 18 years restados for today
			selectYears: 10
		});

	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	$("#formulario").on(
		"submit", 
		function(e){
			e.preventDefault();
		    var f = $(this);
			
		    	var formData = new FormData(document.getElementById("formulario"));
		    
				$.ajax({
		            url: "php/Capital.php",
		            type: "post",
		            dataType: "html",
		            data: formData,
		            cache: false,
		            contentType: false,
		     		processData: false,
		        	success:function(responseText){
		        		//if(/Registro/.test(responseText)){
		        			//$('#modal1').modal('close');
		        			//alert(responseText);
		        			//$("#formulario")[0].reset();
			        		$('#tabla1').bootstrapTable('refresh',{url:'php/Capital.php?acc=calcs'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
			        		//document.getElementById("buscar1").focus();
			        		$('#oculto').show();
			        		llenarAutocomplete(responseText);
		    	    }
		        });
		}	
	);
	/*FINALIZA LA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	function llenarAutocomplete(responseText)
	{
		
		var aux= $.parseJSON(responseText);
		obj = {};
		for (var i = 0; i < aux.length; i++) {
	         console.log(aux[i].asociado_nombre);
	         obj[aux[i].asociado_nombre] = null; 
		}
					      
		$('input.autocomplete').autocomplete({
	          data: obj,
	          limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
		 });
	}
	function imprimirReporte()
	{ 
		window.open('html/reporteCalculadora.php?idc='+$('#autocomplete-input').val()+'&mon='+$('#monto').val()+'&pla='+$('#tiempo').val()+'&int='+$('#interes').val(),'_blank');
	}
	/*FINALIZA EL BLOQUE DE LOS EVENTOS*/
</script>
