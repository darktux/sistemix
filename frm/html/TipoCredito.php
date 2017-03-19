
<!-- INICIA EL BLOQUE DEL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nuevo tipo de crédito"><i class="large material-icons">add</i></a>
</div>













































<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">





























			<h5>Nuevo tipo de crédito</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="nom" id="nom" required>
					<label for="nom">Nombre</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="int" id="int" min="0.00" step="0.01" required>
					<label for="int">Tasa de Interés (%)</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="intmor" id="intmor" min="0.00" step="0.01" required>
					<label for="intmor">Tasa de Interés por mora (%)</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="plamax" id="plamax" min="0.00" required>
					<label for="plamax">Plazo máximo (meses)</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="monmin" id="monmin" min="0.00" required>
					<label for="monmin">Monto mínimo a prestar ($)</label>
				</div>
				<div class="input-field col s12">
					<input type="number" name="monmax" id="monmax" min="0.00" required>
					<label for="monmax">Monto máximo a prestar ($)</label>
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
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">





	<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/TipoCredito.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">




			
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>









































				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="tipocredito_nombre" data-align="center">Nombre</th>
			            <th data-field="tipocredito_interes" data-align="center">Tasa de interés</th>
			            <th data-field="tipocredito_interesxmora" data-align="center">Interés por mora</th>
			            <th data-field="tipocredito_plazomaximo" data-align="center">Plazo máximo</th>
			            <th data-field="tipocredito_montominimo" data-align="center">Monto mínimo</th>
			            <th data-field="tipocredito_montomaximo" data-align="center">Monto máximo</th>
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
	            	nom:$("#nom").val(),
	            	int:$("#int").val(),
	            	intmor:$("#intmor").val(),
	            	plamax:$("#plamax").val(),
	            	monmin:$("#monmin").val(),
	            	monmax:$("#monmax").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	nom:$("#nom").val(),
	            	int:$("#int").val(),
	            	intmor:$("#intmor").val(),
	            	plamax:$("#plamax").val(),
	            	monmin:$("#monmin").val(),
	            	monmax:$("#monmax").val(),
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
            $("#idid").val(JSON.stringify(row.tipocredito_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.tipocredito_nombre).replace(/"/gi,''));
            $("#int").val(JSON.stringify(row.tipocredito_interes).replace(/"/gi,''));
            $("#intmor").val(JSON.stringify(row.tipocredito_interesxmora).replace(/"/gi,''));
            $("#plamax").val(JSON.stringify(row.tipocredito_plazomaximo).replace(/"/gi,''));
            $("#monmin").val(JSON.stringify(row.tipocredito_montominimo).replace(/"/gi,''));
            $("#monmax").val(JSON.stringify(row.tipocredito_montomaximo).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/







































        	$('label').addClass("active");
        	$('#modal1').modal('open');
        },
/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {










































        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del tipo de credito "+JSON.stringify(row.tipocredito_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.tipocredito_id).replace(/"/gi,''),
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
















































        url: "php/TipoCredito.php",/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR *****************************************************************************/
        















































        data:datos,
        success:function(responseText){
        	if(/Registro/.test(responseText)){
        		$('#modal1').modal('close');
        		alert(responseText);
        		$("#formulario")[0].reset();

















































        		$('#tabla1').bootstrapTable('refresh',{url:'php/TipoCredito.php?acc=getjsontabla',pageList: [5,10,25,50,100]});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/















































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
