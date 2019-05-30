$(document).ready(function(){
    $.ajax({
        url: '../controlador/autores/consulta.autores.php',
        dataType: 'json'
    }).done(function(response){
        var tabla = "";
        $.each(response, function(index, data){
            tabla += "<tr>";
            tabla += "<td>" + data.nombre_autor + "</td>";
            tabla += "<td>";
            tabla += "<button class='btn btn-warning' onclick='Modificar(" + data.id_autor + ");'>Modificar</button>"
            tabla += "<button class='btn btn-danger' onclick='Eliminar(" + data.id_autor + ");'>Eliminar</button>"
            tabla += "</td>"
            tabla += "</tr>";
        });

        $('#tabla').html(tabla);
    }).fail(function(response){
        console.log(response);
    });
});


function guardar(e){
    var autores = $('#autores').val();

    if(autores == ""){
        alert("Debe llenar todos los campos");
        return;
    }

    // Guardar
    $.ajax({
        url: '../controlador/autores/guardar.autores.php',
        data: { "nombre_autor" : autores },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos del autor se han guardado de forma exitosa");
        }else{
            console.log(response);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });
}

function Eliminar(idEliminar){
    $.ajax({
        url: '../controlador/autores/eliminar.autores.php',
        data: { "id_autor" : idEliminar },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos se han eliminado de forma exitosa");
            window.location = "autores-consulta.html";
        }else{
            console.log(response);
        }
    }).fail(function(response){
        console.log(response);
    });   
}


function Modificar(id_autor){
    window.location = "autores-modificar.php?id=" + id_autor;
}

function ModificarRegistro(id_autor){
    var autores = $('#autores').val();

    if(autores == ""){
        alert("Debe llenar todos los campos");
        return;
    }

    // Guardar
    $.ajax({
        url: '../controlador/autores/modificar.autores.php',
        data: { "nombre_autor" : autores, "id_autor" : id_autor },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos del autor se han modificado de forma exitosa");
            window.location = "autores-consulta.html";
        }else{
            console.log(response.errorText);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });
}

function limpiar(){
    $('#autores').val("");
}