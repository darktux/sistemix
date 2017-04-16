
<!-- INICIA EL BLOQUE DEL MODAL -->
<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">



			<h5>Aprobación de asociado</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12"> 
		          <input id="nom" name="nom" type="text" class="validate" disabled autofocus="true">
		          <label for="nom">Nombre completo</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m6"> 
			         <input id="dui" name="dui" type="text"  minlength="10" maxlength="10" disabled>
			         <label for="dui">DUI</label>
				</div>
				<div class="input-field col s12 m6"> 
			         <input id="nit" name="nit" type="text"  minlength="17" maxlength="17" disabled>
			         <label for="nit">NIT</label>
				</div>    				
			</div>
			<div class="row">
				<div class="input-field col s12 m6">	
					<input id="fecses" name="fecses" type="date" class="datepicker" >
					<label for="fecses" >Fecha de sesión</label>
				</div>
				<div class="input-field col s12 m6">	
					<input id="nacta" name="nacta" type="number" min="0">
					<label for="nacta" class="active" >N° de acta</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">	
					<input id="npunto" name="npunto" type="text">
					<label for="npunto" >N° de punto</label>
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
	<h4 class="center teal-text">Asociados pendientes de aprobación</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">


	<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Asociado.php?acc=getjsontabla2" data-click-to-select="true"  data-show-refresh="true" data-search="true">
			
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>



				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="asociado_nombre" data-align="center">Nombre</th>
			            <th data-field="asociado_dui" data-align="center">DUI</th>
			            <th data-field="asociado_nit" data-align="center">NIT</th>
			            <th data-field="asociado_municipio" data-align="center">Municipio</th>
			            <th data-field="asociado_estado" data-align="center">Estado</th>
			            <!-- TERMINAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->

				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
		<!--<script src="../js/jquery.maskedinput.js"></script>-->
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
			//max: -6570 //dias equivalentes a 18 years restados for today
		});
   		$('select').material_select();
  		//$("#dui").mask("99999999-9"); // Formato del DUI
		//$("#nit").mask("9999-999999-999-9"); // Formato del NIT
/*INICIA BLOQUE DE CONFIGURACION DE VENTANA MODAL */
		$('.modal').modal({
			dismissible: true,
			opacity: .5,
			inDuration: 300,
			outDuration: 200,
			startingTop: '4%',
			endingTop: '10%',
			ready: function(modal, trigger){/*FUNCION QUE SE ACTIVA CUANDO SE ABRE EL MODAL */


				document.getElementById("nom").focus();/*ID DEL PRIMER ELEMENTO DEL MODAL ****************************************************************************/


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
/*INICIA FUNCION SUBMIT1 PARA GUARDAR Y MODIFICAR */
	function submit1(){

		if($("#idid").val() == ""){/*DATOS PARA CREAR NUEVO REGISTRO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *************************************************/
	            datos = {	
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	fecses:$("#fecses").val(),
	            	nacta:$("#nacta").val(),
	            	npunto:$("#npunto").val(),
	            	acc:'upd2'
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
            '</a>&nbsp;'
        ].join('');
    }
/*TERMINA EL BLOQUE DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
/*INICIA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
    window.operateEvents = {
/*INICIA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .edit': function (e, value, row, index) {

        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
            $("#idid").val(JSON.stringify(row.asociado_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
            $("#dui").val(JSON.stringify(row.asociado_dui).replace(/"/gi,''));
            $("#nit").val(JSON.stringify(row.asociado_nit).replace(/"/gi,''));
 
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/


        	$('label').addClass("active");
        	$('#modal1').modal('open');
        }
    };
/*TERMINA EL BLOQUE DE LAS ACCIONES DE LOS BOTONES MODIFICAR Y ELIMINAR DE LA TABLA*/
function ejecutarajax(datos){
	$.ajax({
        type:"post",
        url: "php/Asociado.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('#modal1').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();

        		$('#tabla1').bootstrapTable('refresh',{url:'php/Asociado.php?acc=getjsontabla2',pageList: [5,10,25,50,100]});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/


        		document.getElementById("buscar1").focus();
				$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
        	}
        	else{
        		alert(responseText);
        	}
        }
    });
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

function prepare(){
		$('label').addClass("active");
        $("input").prop('disabled', false);
        $('select').material_select('destroy');
        $('select').prop("disabled",false);
        $('select').material_select();
        $("textarea").prop('disabled', false);
        $('#modal1').modal('open');
        $("#formulario")[0].reset();
	}

</script>
<script src="../js/funciones.js"></script>