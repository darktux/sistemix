
<!-- INICIA EL BLOQUE DEL MODAL -->
<!-- BOTON DE APERTURA DE MODAL CAMBIAR TOOLTIP************************************************************************************* -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nueva institución de salud"><i class="large material-icons">add</i></a>
</div>
<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" >
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">
			<h5>Nueva institución de salud</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="cor" id="cor" step="1" min="1" max="99"  value="" required>
					<label for="cor">Correlativo</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="nom" id="nom" required>
					<label for="nom">Nombre</label>
				</div>
				<div class="row">
					<div class="input-field col s12">			  		
			          <textarea id="dir" name="dir" class="materialize-textarea"></textarea>
			          <label for="dir">Dirección</label>
				    </div>			    
				</div>
			</div>
			<!-- TERMINAN ELEMENTOS DEL FORMULARIO ********************************************************************************************************************************************************-->
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-light btn" type="submit">Guardar</button>
			<button class="modal-action modal-close waves-effect waves-light btn-flat" type="reset">Cancelar</button>
		</div>
	</form>
</div>
<!-- TERMINA EL BLOQUE DEL MODAL -->
<!-- INICIA EL BLOQUE LA TABLA -->
<div class="container">
	<h4 class="center teal-text">Institución de salud</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">
			<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/InstitucionesSalud.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true" data-pagination="true" data-page-size="5" data-page-list="[5,8,10,20,50,100]">
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>
				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
				    	<th data-field="institucionsalud_correlativo" data-align="center">Correlativo</th>
			            <th data-field="institucionsalud_nombre" data-align="center">Nombre</th>
			            <th data-field="institucionsalud_direccion" data-align="center">Dirección</th>
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
		/*INICIA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('.modal').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */
				document.getElementById("cor").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/
				$('#modalcontent').animate({scrollTop:0},{duration:"slow"});
			},
			complete: function() {/*FUNCION QUE SE ACTIVA CUANDO SE CIERRA EL MODAL*/
				$("#idid").val("");
				$('label').removeClass("active");
				//iNICIA BLOQUE PARA ANADIR CODIGO SEGUN SE NECESITE *************************************************************************************************

				//TERMINA BLOQUE ANADIR CODIGO SEGUN SE NECESITE******************************************************************************************************
			}
		});
	/*FINALIZA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
	});
	/*FINALIZA FUNCION READY PARA INICIALIZAR LOS ELEMENTOS */
	/*INICIA FUNCION REEMPLAZO DE SUBMIT PARA GUARDAR Y MODIFICAR */
	$("#formulario").on(
		"submit", 
		function(e){
	    	e.preventDefault();
	    	var f = $(this);
	    	var formData = new FormData(document.getElementById("formulario"));
	    	if($("#idid").val() == ""){ 
	        	formData.append("acc", "set"); 
			}
			else{
		    	formData.append("id", $("#idid").val());
		    	formData.append("acc", "upd");
			}
			$.ajax({
	            url: "php/InstitucionesSalud.php",
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
		        		$('#tabla1').bootstrapTable('refresh',{url:'php/InstitucionesSalud.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
		        		document.getElementById("buscar1").focus();
						$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
	        		}
	        		else{
	        			alert(responseText);
		        	}
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
            '</a>'
        ].join('');
    }
	/*TERMINA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
	/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
            $("#idid").val(JSON.stringify(row.institucionsalud_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.institucionsalud_nombre).replace(/"/gi,''));
            $("#dir").val(JSON.stringify(row.institucionsalud_direccion).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
		/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
		/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del tipo de credito "+JSON.stringify(row.institucionsalud_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.institucionsalud_id).replace(/"/gi,''),
	            	acc:'del'
	            }
	        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
	            ejecutarajax(datos);
            }
        }
	/*TERMINA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
    };
	/*TERMINA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
	function ejecutarajax(datos){
		$.ajax({
	        url: "php/InstitucionesSalud.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
	        type:"post",
	        dataType:"html",
	        data:datos,
	        cache: false,
	        success:function(responseText){
	        	if(/Registro/.test(responseText)){
	        		$('#modal1').modal('close');
	        		alert(responseText);
	        		$("#formulario")[0].reset();
	        		$('#tabla1').bootstrapTable('refresh',{url:'php/InstitucionesSalud.php?acc=getjsontabla'});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/
	        		document.getElementById("buscar1").focus();
					$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
	        	}
	        	else{
	        		alert(responseText);
	        	}
	        }
	    });
	}
	/*INICIA EL BLOQUE DE LOS EVENTOS*/
	$("#cor").keyup(function() {

		if(!isNaN($('#cor').val()) && $('#cor').val()!=''){
			var a = parseInt( $('#cor').val() );
			if(a==0){
				$('#cor').val(''); 
			}
			else if(a<10){
				$('#cor').val('0'+a);
			}
			else{
				$('#cor').val(''+a);
			}
		}
		else{
			$('#cor').val(''); 
		}

	});
	$("#cor").blur(function() {

		if(!isNaN($('#cor').val()) && $('#cor').val()!=''){
			var a = parseInt( $('#cor').val() );
			if(a==0){
				$('#cor').val(''); 
			}
			else if(a<10){
				$('#cor').val('0'+a);
			}
			else{
				$('#cor').val(''+a);
			}
		}
		else{
			$('#cor').val(''); 
		}

	});
	/*FINALIZA EL BLOQUE DE LOS EVENTOS*/
	</script>