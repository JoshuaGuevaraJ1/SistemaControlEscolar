$(buscarDatos());

function buscarDatos(consulta){
    $.ajax({
        url: '../Alumnos/Buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $('#tablaCRUD').html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on('keyup', '#cajaBusqueda', function(){
    var valor = $(this).val();
    if(valor != ""){
        buscarDatos(valor);
    }else{
        buscarDatos();
    }
});