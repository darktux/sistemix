<div class="parallax-container  col s12 m6 12">
    <div class="">
        <div class="container">
                <h2 class="header center white-text">"Tus aportes de hoy serán tu éxito futuro"</h2>
            <div class="row center" style="width: 200px;margin-left: auto;margin-right: auto;">
                <div class="" style="margin: auto;">
                    <img src="../img/logo.jpg" width="200" class="circle z-depth-5" style="border-style: solid;border-width: 3px;border-color: #80cbc4;">
                </div>       
            </div>
            <div class="row center">
            	<h5 class="header center white-text text-lighten-2"><b>Accesos directos</b></h5>
            </div>
        </div>
    </div>
    <div class="parallax" style="height: 600px;"><img src="../img/fondo6.png" alt="Unsplashed background img 2"></div>
</div>
<div class="row">
	<div class="col s12 m6 l3">
		<div class="card">
			<div class="card-image">
				<img src="../img/ad1.png" height="250">
				<span class="card-title black-text"><b>Gestión de cuenta</b></span>
				<a id="directo-ncue" class="btn-floating btn-large halfway-fab waves-effecs waves-light teal"><i class="material-icons">add</i></a>
			</div>
			<div class="card-content">
				<p>
					Apertura una nueva cuenta para un socio.
				</p>
			</div>
		</div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
			<div class="card-image">
				<img src="../img/ad2.png" height="250">
				<span class="card-title black-text"><b>Movimiento de la cuenta</b></span>
				<a id="directo-mcue" class="btn-floating btn-large halfway-fab waves-effecs waves-light teal"><i class="material-icons">add</i></a>
			</div>
			<div class="card-content">
				<p>
					Consulta de saldos de una cuenta específica de un socio.
				</p>
			</div>
		</div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
			<div class="card-image">
				<img src="../img/ad3.png" height="250">
				<span class="card-title black-text"><b>Solicitud de crédito</b></span>
				<a id="directo-ncre" class="btn-floating btn-large halfway-fab waves-effecs waves-light teal"><i class="material-icons">add</i></a>
			</div>
			<div class="card-content">
				<p>
					Apertura de un plan de crédito para un socio.
				</p>
			</div>
		</div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
			<div class="card-image">
				<img src="../img/fondo11.png" height="250">
				<span class="card-title" ><b>Gestión de crédito</b></span>
				<a id="directo-mcre" class="btn-floating btn-large halfway-fab waves-effecs waves-light teal"><i class="material-icons">add</i></a>
			</div>
			<div class="card-content">
				<p>
					Consulta y abono a cuenta de crédito de un  socio.
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
(function($){
	$(function(){
	    $('.button-collapse').sideNav();
	    $('.parallax').parallax();
	}); // end of document ready
})(jQuery); // end of jQuery name space
$("#directo-ncue").click(function(){
    $("#formularios").load('html/Cuenta.php');
});
$("#directo-mcue").click(function(){
    $("#formularios").load('html/ingCuentaMovimiento.html');
});
$("#directo-ncre").click(function(){
    $("#formularios").load('html/Credito.php');
});
$("#directo-mcre").click(function(){
    $("#formularios").load('html/ingCreditoMovimiento.html');
});
</script>