$(document).ready(function(){
	$( "#comprar" ).click(function(event) {
		$.ajax({
  			type:"POST",
  			url:"php/registrarCompra.php",
  			success:function(respuesta){
				respuesta=respuesta.trim();
				if(respuesta==0){
					console.log("Acceso correcto");
					swal("GRACIAS POR SU COMPRA","Su pedido será entregado a la brevedad.\nRedireccionando al menú principal.","success");
                    setTimeout(function(){
                        window.location="index.php";
                      }, 3000);
				}else if(respuesta==1){
					event.preventDefault();
					swal("SALDO INSUFICIENTE","Redireccionando al carrito","error");
                    setTimeout(function(){
                        window.location="cart.php";
                      }, 3000);
 
				}else if(respuesta==2){
                    event.preventDefault();
					swal("POCA DISPONIBILIDAD DE INVENTARIO","Redireccionando al carrito","error");
                    setTimeout(function(){
                        window.location="cart.php";
                      }, 3000);
                }
  			}
  		});
  		return false;
  	
	});	
});