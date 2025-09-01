$(document).ready(function(){
    cargarTabla();

    $("#formRegistro").submit(function(e){
        e.preventDefault();
        $.post("registrar_salida.php", $(this).serialize(), function(data){
            alert(data);
            $("#formRegistro")[0].reset();
            cargarTabla();
        });
    });

    $("#formEditar").submit(function(e){
        e.preventDefault();
        $.post("editar_salida.php", $(this).serialize(), function(data){
            alert(data);
            cerrarModal();
            cargarTabla();
        });
    });
});

function cargarTabla(){
    $.get("listar_salida.php", function(data){
        $("#tablaDatos").html(data);
    });
}

function editar(id){
    $.getJSON("obtener_salida.php?id="+id, function(data){
        $("#editId").val(data.id);
        $("#editDNI").val(data.dni);
        $("#editIdObjeto").val(data.idObjeto);
        $("#editCantidad").val(data.cantidad);
        $("#editAsunto").val(data.asunto);
        $("#modalEditar").show();
    });
}

function cerrarModal(){ $("#modalEditar").hide(); }

function eliminar(id){
    if(confirm("¿Desea eliminar este registro?")){
        $.post("eliminar_salida.php",{id:id},function(data){
            alert(data);
            cargarTabla();
        });
    }
}
