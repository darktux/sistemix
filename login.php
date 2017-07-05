<!DOCTYPE html> 
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<!-- Hago saber al navegador que el sitio es responsivo -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<!-- Iconos de Google -->
	<link href="css/iconos.css" rel="stylesheet">
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<!-- Materialize -->
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	
</head>
<body class="teal loaded">
	<!-- Start page loading -->
	<div class="loader-wrapper">
		<div id="loader">
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>
	</div>
	<!-- End page loading --> 
	
	<div class="row" id="login-page">
		<div class="col s12 z-depth-4 card-panel">
			<form class="login-form" id="formLogin">
				<div class="row">
					<div class="input-field col s12 center">
						<img src="img/logologin.png" class="circle responsive-img valign profile-image-login">
						<p class="center login-form-text">Ingrese sus credenciales</p>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="username" name="username" type="text" required>
						<label for="username">Usuario</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="material-icons prefix">lock</i>
						<input id="password" name="password" type="password" required>
						<label for="password">Contraseña</label>
					</div>
				</div>
				<!-- <div class="row">
					<div class="input-field col s12 m12 l12  login-text">
						<input type="checkbox" id="remember-me" name="remember-me">
						<label for="remember-me">Remember me</label>
					</div>
				</div> -->
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" class="btn waves-effect waves-light col s12 teal">Iniciar sesión</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/materialize.js"></script>
	<script>
		$("#formLogin").on("submit",function(e){
			e.preventDefault();
			var f = $(this);
			var formData = new FormData(document.getElementById("formLogin"));
			formData.append("acc","login");
			$.ajax({
				url: "frm/php/datos.php",
				type: "post",
				dataType: "html",
				cache: false,
				contentType: false,
				processData: false,
				data: formData,
				success:function(responseText){
					if(responseText=="match"){
						location.href="frm/index.php";
					}else{
						alert("La contraseña no coincide");
					}
				}
			});
		});

	</script>
</body>
</html>