
<!-- FINALIZA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Capital</h4>
	<form id="formulario">
		<div class="row">
			<div class="input-field col s3"> 
				<input id="monto" name="monto" type="text" class="validate" required autofocus="true">
				<label id="lmonto" for="monto">Monto</label>
	        </div>
	        <div class="input-field col s3"> 
				<input id="tiempo" name="tiempo" type="text" class="validate" required autofocus="true">
				<label id="ltiempo" for="tiempo">Tiempo</label>
	        </div>
	        <div class="input-field col s3"> 
				<input id="interes" name="interes" type="text" class="validate" required autofocus="true">
				<label id="linteres" for="interes">Interes</label>
	        </div>
	         <div class="input-field col s3"> 
				<button class="waves-effect waves-light btn" type="submit">Calcular</button>
				<input type="hidden" name="acc" value="calc">
	        </div>
		</div>	
	</form>

	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *******************************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-click-to-select="true"  data-show-refresh="true"  data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<!-- <th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th> -->
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*-->
			            <th data-field="calculos_cuota" data-align="center">Cuota</th>
			            <th data-field="calculos_amortizacion" data-align="center">Capital</th>
			            <th data-field="calculos_intereses" data-align="center">Interes</th>
			            <th data-field="calculos_monto" data-align="center">Monto ($)</th>
			          
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
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: true, // Creates a dropdown of 15 years to control year
			max: 1 //dias equivalentes  years restados for today
		});
		/*INICIA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		
	});
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
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
		        			alert(responseText);
		        			//$("#formulario")[0].reset();
			        		$('#tabla1').bootstrapTable('refresh',{url:'php/Capital.php?acc=calcs'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
			        		document.getElementById("buscar1").focus();
							$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
		        		//}
		        		//else{
		        		//	alert('este'+responseText);
			        	//}
		    	    }
		        });
			
		}	
	);
	/*FINALIZA LA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
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
	/*FINALIZA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
		/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
            $("#idid").val(JSON.stringify(row.capital_id).replace(/"/gi,''));
            $("#ani").val(JSON.stringify(row.capital_anio).replace(/"/gi,''));
            $("#fec").val(JSON.stringify(row.capital_fec).replace(/"/gi,''));
            $("#con").val(JSON.stringify(row.capital_concepto).replace(/"/gi,''));
            $("#dep").val(JSON.stringify(row.capital_deposito).replace(/"/gi,''));
            $("#ret").val(JSON.stringify(row.capital_retiro).replace(/"/gi,''));
            $("#sal").val(JSON.stringify(row.capital_saldo).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
		/*FINALIZA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS*************************************/
            if(confirm("Realmente desea eliminar el registro del capital "+JSON.stringify(row.capital_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.tipocuenta_id).replace(/"/gi,''),
	            	acc:'del'
	            }
	            ejecutarajax(datos);
            }
            /*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS************************************/
        },
		/*FINALIZA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .view': function (e, value, row, index) {
        	alert("sdfkhkj"); /********************************************************************************************************/          
        }
		/*FINALIZA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
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
	        		$('#tabla1').bootstrapTable('refresh',{url:'php/Capital.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
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
	        url: "php/Capital.php",
	        data:{acc:'getSaldoCapital'},
	        success:function(responseText){
	        	$("#sal0").val(responseText);
	        	$("#sal").val(responseText);
	        	//alert(responseText);
	        }
	    });
	}
	/*FINALIZA FUNCION PARA OBTENER DE LA BASE EL SALDO DE CAPITAL */
	/*INICIA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */
	function actualizasaldo(){
		var s0= parseFloat($("#sal0").val());
		if($("#mon").val()==''){m=0.0;}else{var m= parseFloat($("#mon").val());}
		if(document.getElementById("dep1").checked){//deposito
			$("#sal").val( parseFloat(''+(s0+m)).toFixed(2) );
		}
		else if(document.getElementById("ret1").checked){//retiro
			$("#sal").val( parseFloat(''+(s0-m)).toFixed(2) );
		}
	}
	/*FINALIZA FUNCION PARA ACTUALIZAR SALDO DE CAPITAL */
	/*INICIA FUNCION PARA VALIDAR RETIRO DE CAPITAL */
	
	/*FINALIZA FUNCION PARA VALIDAR RETIRO DE CAPITAL */
	/*INICIA EL BLOQUE DE LOS EVENTOS*/
	$(".actsal").change(function(){ actualizasaldo(); });
	$("#mon").keyup(function(){ actualizasaldo(); });
	$("#mon").blur(function(){ validarretiro(); });
	/*FINALIZA EL BLOQUE DE LOS EVENTOS*/
</script>
