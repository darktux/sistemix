
<!-- INICIA EL BLOQUE DEL MODAL -->
<div class="fixed-action-btn">
	<a class="modal-trigger btn-floating waves-effect waves-light btn-large cyan darken-1 tooltipped" href="#modal1" data-position="top" data-tooltip="Nuevo Asociado" onclick="prepare();"><i class="large material-icons">add</i></a>
</div>



<div id="modal1" class="modal modal-fixed-footer">
	<form class="col s12" id="formulario" onsubmit="return submit1();">
		<input id="idid" type="hidden" value="">
		<div class="modal-content" id="modalcontent">



			<h5>Aprobación de asociado</h5><!-- //TITULO DEL MODAL *************************************************************************************************-->
			<!-- INICIAN ELEMENTOS DEL FORMULARIO (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR) *****************************************************************-->
			<div class="row">
				<div class="input-field col s12"> 
		          <input id="nom" name="nom" type="text" class="validate" required autofocus="true">
		          <label for="nom">Nombre completo</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m6"> 
			         <input id="dui" name="dui" type="text"  minlength="10" maxlength="10" required>
			         <label for="dui">DUI</label>
				</div>
				<div class="input-field col s12 m6"> 
			         <input id="nit" name="nit" type="text"  minlength="17" maxlength="17" required>
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
					<select class="" id="est" name="est" required>
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
					<select class="" id="inst" name="inst" required>
						<option value="" disabled selected>Seleccione una institución</option>
					</select>
					<label for="inst">Institución de salud</label>
				</div>
			</div>
		
			<div id="divBen">
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
    			<!-- <div class="divider"></div> -->
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
	<h4 class="center teal-text">Asociado</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection"/> 
		<div class="col s12">


	<!-- MODIFICAR LA data-url SEGUN SEA EL CASO DEL FORMULARIO QUE SE ESTE TRABAJANDO *************************************-->
			<table id="tabla1" data-toggle="table" class="table table-striped table-hover"  data-url="php/Asociado.php?acc=getjsontabla" data-click-to-select="true"  data-show-refresh="true" data-search="true">
			
			    <thead>
				    <tr>
				    	<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>



				    	<!-- INICIA ELEMENTOS DE LA TABLA (CAMBIAR DEPENDIENDO DEL FORMULARIO A TRABAJAR, USAR NOMBRES DE CAMPOS SEGUN BASE DE DATOS)*******************-->
			            <th data-field="asociado_nombre" data-align="center">Nombre</th>
			            <th data-field="asociado_dui" data-align="center">DUI</th>
			            <th data-field="asociado_nit" data-align="center">NIT</th>
			            <th data-field="asociado_municipio" data-align="center">Municipio</th>
			            <th data-field="asociado_profesionoficio" data-align="center">Profesión u Oficio</th>
			            <!-- TERMINAN ELEMENTOS DE LA TABLA ************************************************************************************************************-->




				    </tr>
			    </thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
		<script src="../js/jquery.maskedinput.js"></script>
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
  		$('#dir').trigger('autoresize');
  		cargarDepartamentos("dep");
		cargarMunicipios("dep","mun");
		cargarInstituciones();
  		$('select').material_select();
  		$('ul.tabs').tabs();
  		$('.indicator').addClass('teal');
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
	            	nom:$("#nom").val(),
	            	dui:$("#dui").val(),
	            	nit:$("#nit").val(),
	            	ext:$("#ext").val(),
	            	fecdui:$("#fecdui").val(),
	            	lugnac:$("#lugnac").val(),
	            	fecnac:$("#fecnac").val(),
	            	nac:$("#nac").val(),
	            	est:$("#est").val(),
	            	dep:$("#dep").val(),
	            	mun:$("#mun").val(),
	            	dir:$("#dir").val(),
	            	prouof:$("#prouof").val(),
	            	ingmen:$("#ingmen").val(),
	            	status:'En espera',
	            	inst:$("#inst").val(),
	            	nom1:$("#nom1").val(),
	            	par1:$("#par1").val(),
	            	por1:$("#por1").val(),
	            	dir1:$("#dir1").val(),
	            	nom2:$("#nom2").val(),
	            	par2:$("#par2").val(),
	            	por2:$("#por2").val(),
	            	dir2:$("#dir2").val(),
	            	nom3:$("#nom3").val(),
	            	par3:$("#par3").val(),
	            	por3:$("#por3").val(),
	            	dir3:$("#dir3").val(),
	            	nom4:$("#nom4").val(),
	            	par4:$("#par4").val(),
	            	por4:$("#por4").val(),
	            	dir4:$("#dir4").val(),
	            	acc:'set'
	            }
		}
		else{/*DATOS PARA MODIFICAR UN REGISTRO (SON LOS MISMOS QUE PARA CREAR NUEVO PERO AñADIENDO ID Y CAMBIA set A upd) *******************************************/
	            datos = {
	            	id:$("#idid").val(),
	            	nom:$("#nom").val(),
	            	dui:$("#dui").val(),
	            	nit:$("#nit").val(),
	            	ext:$("#ext").val(),
	            	fecdui:$("#fecdui").val(),
	            	lugnac:$("#lugnac").val(),
	            	fecnac:$("#fecnac").val(),
	            	nac:$("#nac").val(),
	            	est:$("#est").val(),
	            	dep:$("#dep").val(),
	            	mun:$("#mun").val(),
	            	dir:$("#dir").val(),
	            	prouof:$("#prouof").val(),
	            	ingmen:$("#ingmen").val(),
	            	inst:$("#inst").val(),
	            	nom1:$("#nom1").val(),
	            	par1:$("#par1").val(),
	            	por1:$("#por1").val(),
	            	dir1:$("#dir1").val(),
	            	nom2:$("#nom2").val(),
	            	par2:$("#par2").val(),
	            	por2:$("#por2").val(),
	            	dir2:$("#dir2").val(),
	            	nom3:$("#nom3").val(),
	            	par3:$("#par3").val(),
	            	por3:$("#por3").val(),
	            	dir3:$("#dir3").val(),
	            	nom4:$("#nom4").val(),
	            	par4:$("#par4").val(),
	            	por4:$("#por4").val(),
	            	dir4:$("#dir4").val(),
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
            $("#idid").val(JSON.stringify(row.asociado_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
            $("#dui").val(JSON.stringify(row.asociado_dui).replace(/"/gi,''));
            $("#nit").val(JSON.stringify(row.asociado_nit).replace(/"/gi,''));
            $("#ext").val(JSON.stringify(row.asociado_extendido).replace(/"/gi,''));
            $("#fecdui").val(JSON.stringify(row.asociado_fechaextendido).replace(/"/gi,''));
            $("#lugnac").val(JSON.stringify(row.asociado_lugarnacimiento).replace(/"/gi,''));
            $("#fecnac").val(JSON.stringify(row.asociado_fechanacimiento).replace(/"/gi,''));
            $("#nac").val(JSON.stringify(row.asociado_nacionalidad).replace(/"/gi,''));
            $("#est").val(JSON.stringify(row.asociado_estadocivil).replace(/"/gi,''));
            $("#dep").val(JSON.stringify(row.asociado_departamento).replace(/"/gi,''));
            $("#mun").val(JSON.stringify(row.asociado_municipio).replace(/"/gi,''));
            $("#dir").val(JSON.stringify(row.asociado_direccion).replace(/"/gi,''));
            $("#prouof").val(JSON.stringify(row.asociado_profesionoficio).replace(/"/gi,''));
            $("#ingmen").val(JSON.stringify(row.asociado_ingresomes).replace(/"/gi,''));
            $("#inst").val(JSON.stringify(row.asociado_institucionsaludid).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/


        	$.ajax({
				type:"post",
				url: "php/Asociado.php",
				data:{acc:'busBen',idasociado: JSON.stringify(row.asociado_id).replace(/"/gi,'')},
				success:function(data){
					var obj = $.parseJSON(data);
					var ii=0;
					$.each(obj,function(i,item){
						ii++;						
						$("#nom"+ii).val(item.beneficiario_nombre);
						$("#par"+ii).val(item.beneficiario_parentezco);
						$("#por"+ii).val(item.beneficiario_porcentaje);
						$("#dir"+ii).val(item.beneficiario_direccion);
					});
				}
			});


        	$('label').addClass("active");
        	$("input").prop('disabled', false);
        	$('select').material_select('destroy');
        	$('select').prop("disabled",false);
        	$('select').material_select();
        	$("textarea").prop('disabled', false);
        	$('#modal1').modal('open');
        },
/*TERMINA ACCION DEL BOTON MODIFICAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
        'click .remove': function (e, value, row, index) {


        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/
            if(confirm("Realmente desea eliminar el registro del asociado "+JSON.stringify(row.asociado_nombre).replace(/"/gi,''))){ /* CAMBIAR FRASE SEGUN LO QUE SE VA A ELIMINAR*/
            	datos = {
	            	id:JSON.stringify(row.asociado_id).replace(/"/gi,''),
	            	acc:'del'
	            }
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***********************************************/

	            ejecutarajax(datos);
            }
        },
/*TERMINA ACCION DEL BOTON ELIMINAR (COPIA LOS VALORES DEL REGISTRO A LOS CAMPOS DEL FORMULARIO MODAL)*/
/*INICIA ACCION DEL BOTON VIEW (COPIA LOS VALORES DEL REGISTRO DE CAMPO DE row. SON COMO EN LA VASE DE DATOS*/
		'click .view': function (e,value,row,index){
			/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
            $("#idid").val(JSON.stringify(row.asociado_id).replace(/"/gi,''));
            $("#nom").val(JSON.stringify(row.asociado_nombre).replace(/"/gi,''));
            $("#dui").val(JSON.stringify(row.asociado_dui).replace(/"/gi,''));
            $("#nit").val(JSON.stringify(row.asociado_nit).replace(/"/gi,''));
            $("#ext").val(JSON.stringify(row.asociado_extendido).replace(/"/gi,''));
            $("#fecdui").val(JSON.stringify(row.asociado_fechaextendido).replace(/"/gi,''));
            $("#lugnac").val(JSON.stringify(row.asociado_lugarnacimiento).replace(/"/gi,''));
            $("#fecnac").val(JSON.stringify(row.asociado_fechanacimiento).replace(/"/gi,''));
            $("#nac").val(JSON.stringify(row.asociado_nacionalidad).replace(/"/gi,''));
            $("#est").val(JSON.stringify(row.asociado_estadocivil).replace(/"/gi,''));
            $("#dep").val(JSON.stringify(row.asociado_departamento).replace(/"/gi,''));
            $("#mun").val(JSON.stringify(row.asociado_municipio).replace(/"/gi,''));
            $("#dir").val(JSON.stringify(row.asociado_direccion).replace(/"/gi,''));
            $("#prouof").val(JSON.stringify(row.asociado_profesionoficio).replace(/"/gi,''));
            $("#ingmen").val(JSON.stringify(row.asociado_ingresomes).replace(/"/gi,''));
            $("#inst").val(JSON.stringify(row.asociado_institucionsaludid).replace(/"/gi,''));
        	/*CAMBIAR SEGUN EL FORMULARIO QUE SE TRABAJA, LOS NOMBRES DE CAMPO DE row. SON COMO EN LA BASE DE DATOS***************************************************/
        	$.ajax({
				type:"post",
				url: "php/Asociado.php",
				data:{acc:'busBen',idasociado: JSON.stringify(row.asociado_id).replace(/"/gi,'')},
				success:function(data){
					var obj = $.parseJSON(data);
					var ii=0;
					$.each(obj,function(i,item){
						ii++;						
						$("#nom"+ii).val(item.beneficiario_nombre);
						$("#par"+ii).val(item.beneficiario_parentezco);
						$("#por"+ii).val(item.beneficiario_porcentaje);
						$("#dir"+ii).val(item.beneficiario_direccion);
					});
				}
			});


        	$('label').addClass("active");
        	$("input").prop('disabled', true);
        	$('select').material_select('destroy');
        	$('select').prop("disabled",true);
        	$('select').material_select();
        	$("textarea").prop('disabled', true);
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

















































        		$('#tabla1').bootstrapTable('refresh',{url:'php/Asociado.php?acc=getjsontabla',pageList: [5,10,25,50,100]});/*CAMBIAR LA RUTA DE ACUERDO AL FORMULARIO A TRABAJAR ************/















































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