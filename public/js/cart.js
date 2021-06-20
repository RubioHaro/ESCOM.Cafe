$(document).ready(function(){
    

    $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id=$(this).data('id');
        var boton=$(this);
        $.ajax({
            method:'POST',
            url:'./php/eliminarCarrito.php',
            data:{
                id:id
            }
        }).done(function(respuesta){
            boton.parent('td').parent('tr').remove();
        });
    });

    $(".txtCantidad").keyup(function(){

        var cantidad=$(this).val();
        var precio=$(this).data('precio');
        var id=$(this).data('id');
        incrementar(cantidad,precio,id);
    });

    $(".btnIncrementar").click(function(){
        var precio=$(this).parent('div').parent('div').find('input').data('precio');
        var id=$(this).parent('div').parent('div').find('input').data('id');
        var cantidad=$(this).parent('div').parent('div').find('input').val();
        incrementar(cantidad,precio,id);
    });

    $(".btnDisminuir").click(function(){
        var precio=$(this).parent('div').parent('div').find('input').data('precio');
        var id=$(this).parent('div').parent('div').find('input').data('id');
        var cantidad=$(this).parent('div').parent('div').find('input').val();
        incrementar(cantidad,precio,id);
    });

    function incrementar(cantidad, precio,id){
        var mult=parseFloat(cantidad)* parseFloat(precio);
        $(".cant"+id).text("$"+mult); 
        $.ajax({
            method:'POST',
            url:'./php/actualizar.php',
            data:{
                id:id,
                cantidad:cantidad
            }
        }).done(function (respuesta) { 
           
         });
        
    }
});