<div class="parallax-container  col s12 m6 12">
    <div class="">
        <div class="container">
                <h2 class="header center white-text">"Tus aportes de hoy serán tu éxito futuro"</h2>
            <div class="row center" style="width: 200px;margin-left: auto;margin-right: auto;">
                <div class="" style="margin: auto;">
                    <img src="../img/logo.jpg" width="200" class="circle z-depth-5" style="border-style: solid;border-width: 3px;border-color: #80cbc4;">
                </div>       
            </div>
            
        </div>
    </div>
    <div class="parallax" style="height: 600px;"><img src="../img/fondo6.png" alt="Unsplashed background img 2"></div>
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