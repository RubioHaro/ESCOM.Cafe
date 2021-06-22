$(document).ready(function () { 
    var idEliminar=-1;
    var idEditar=-1;
    var fila;
    $(".btnEliminar").click(function() { 
        idEliminar=$(this).data('id');
        fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function() { 
        $.ajax({
            url: './../php/eliminarproducto.php',
            method: 'POST',
            data:{
                id:idEliminar
            } 
        }).done(function(res) { 
            $(fila).fadeOut(1000);
         });
        
    });
    $(".btnEditar").click(function (e) { 
        idEditar=$(this).data('id');
        var nombre=$(this).data('nombre');
        var descripcion=$(this).data('descripcion');
        var inventario=$(this).data('inventario');
        var categoria=$(this).data('categoria');
        var precio=$(this).data('precio');
        $("#nombreEdit").val(nombre);
        $("#descripcionEdit").val(descripcion);
        $("#inventarioEdit").val(inventario);
        $("#categoriaEdit").val(categoria);
        $("#precioEdit").val(precio);
        $("#idEdit").val(idEditar);
        
    });
 });