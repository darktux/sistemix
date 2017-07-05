<!-- Fixed button to call modal -->
<div class="fixed-action-btn">
	<a href="#modalUs" class="modal-trigger btn-floating waves-effect waves-light btn-large tooltipped" data-position="top" data-tooltip="Agregar usuario"><i class="large material-icons">add</i></a>
</div>

<!-- Start modal form to upload newsletter-->
<div class="modal modal-fixed-footer" id="modalUs">
	<form class="col s12" id="formUs">
		<input type="hidden" name="idid" id="idid"> 
		<div class="modal-content">
			<h5 class="center">Agregar Usuario</h5>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="nom" id="nom" required>
					<label for="nom">Nombre</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="usu" id="usu" required>
					<label for="usu">Usuario</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="password" name="con" id="con" required>
					<label for="con">Contraseña</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="password" name="con2" id="con2" required>
					<label for="con2">Repetir Contraseña</label>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn waves-effect waves-light" type="submit" name="guardar" id="guardar">Guardar<i class="material-icons right">send</i></button>
			<a href="#!" class="waves-effect waves-teal btn-flat modal-close">Cancelar</a>			
		</div>
	</form>
</div>
<!-- End modal -->

<!-- Table usuarios -->
<div class="container">
	<h4 class="center">Usuarios</h4>
	<div class="row">
		<link href="../css/bootstrap-table.css" type="text/css" rel="stylesheet" media="screen,projection">
		<div class="col s12">
			<!-- Change URL according to case -->
			<table id="tableUsu" data-toggle="table" class="table table-striped table-hover" data-url="php/datos.php?acc=getUsu" data-click-to-select="false" data-show-refresh="true" data-search="true">
				<thead>
					<tr>
						<th data-field="operate" data-align="center" data-formatter="operateFormatter" data-events="operateEvents">Acciones</th>
						<!-- Table elements (Change according to form, use name as database) -->
						<th data-field="usuario_nombre" data-align="center">Nombre</th>
						<th data-field="usuario_usu" data-align="center">Usuario</th>
						<!-- End table elements-->
					</tr>
				</thead>
			</table>
		</div>
		<script src="../js/bootstrap-table.js"></script>
	</div>
</div>
<!-- End table -->

<script>
	$(document).ready(function(){
		$('.modal').modal();
		$('.tooltipped').tooltip();
		$('.indicator').addClass('blue');
	});

	$("#formUs").on("submit",function(e){
		e.preventDefault();
		var f = $(this);
		if($("#con").val()==$("#con2").val()){
			var formData = new FormData(document.getElementById("formUs"));
			if ($("#idid").val()=="") {
				formData.append("acc","setUsu");
			}else{
				formData.append("id", $("#idid").val());
				formData.append("acc", "updUsu");
			}

			$.ajax({
				url: "php/datos.php",
				type: "post",
				dataType: "html",
				cache: false,
				contentType: false,
				processData: false,
				//Form data del formulario
				data: formData,
				success:function(responseText){
					alert(responseText);
					$(".modal").modal('close');
					$('#tableUsu').bootstrapTable('refresh',{url:'php/datos.php?acc=getUsu'});
		        	document.getElementById("buscar1").focus();
					$('html,body').animate({scrollTop:$("#buscar1").offset().top},{duration:"slow"});
				}
			});
		}else{
			alert("Las contraseñas no coinciden");
		}
	});

	function operateFormatter(value, row, index) {
		return [
			// '<a class="edit ml10" href="javascript:void(0)" title="Modificar">',
   //              '<i class="material-icons">mode_edit</i>',
   //          '</a>&nbsp;',
            '&nbsp;<a class="remove ml10" href="javascript:void(0)" title="Eliminar">',
                '<i class="material-icons">delete</i>',
            '</a>'
		].join('');
	}

	window.operateEvents={
		'click .edit': function(e,value,row,index){
			$("#formUs")[0].reset();
			$("#idid").val(JSON.stringify(row.usuario_id).replace(/"/gi,''));
			$("#nom").val(JSON.stringify(row.usuario_nombre).replace(/"/gi,''));
			$("#usu").val(JSON.stringify(row.usuario_usu).replace(/"/gi,''));
			$("#con").val(JSON.stringify(row.usuario_pass).replace(/"/gi,''));
			$('label').addClass("active");
			$('#modalUs').modal('open');
		},
		'click .remove': function(e,value,row,index){
			if(confirm("Esta seguro que desea eliminar: "+JSON.stringify(row.usuario_usu).replace(/"/gi,''))){
				$.ajax({
					url: "php/datos.php",
					type: "post",
					data: {
						id: JSON.stringify(row.usuario_id).replace(/"/gi,''),
						acc: 'delUsu'
					},
					success:function(responseText){
						alert(responseText);
					}
				});
			}
		}
	};


	function limpiaForm(){
		$("#formUs")[0].reset();
	}
	
</script>