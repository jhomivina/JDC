$(document).ready(function(){
    $.ajax({
        url: '../controlador/editorial/consulta.editorial.php',
        dataType: 'json'
    }).done(function(response){
        var tabla = "";
        $.each(response, function(index, data){
            tabla += "<tr>";
            tabla += "<td>" + data.nombreEditorial + "</td>";
            tabla += "<td>";
            tabla += "<button class='btn btn-warning' onclick='Modificar(" + data.idEditorial + ");'>Modificar</button>"
            tabla += "<button class='btn btn-danger' onclick='Eliminar(" + data.idEditorial + ");'>Eliminar</button>"
            tabla += "</td>"
            tabla += "</tr>";
        });

        $('#tabla').html(tabla);
    }).fail(function(response){
        console.log(response);
    });
});

function guardar(){
    var editorial = $('#editorial').val();

    if(editorial == ""){
        alert("Debe llenar todos los campos");
        return;
    }

    // Guardar
    $.ajax({
        url: '../controlador/editorial/guardar.editorial.php',
        data: { "NombreEditorial" : editorial },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos de la editorial se han guardado de forma exitosa");
        }else{
            console.log(response.errorText);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });
}

function Eliminar(idEliminar){
    $.ajax({
        url: '../controlador/editorial/eliminar.editorial.php',
        data: { "idEditorial" : idEliminar },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos se han eliminado de forma exitosa");
            window.location = "editorial-consulta.html";
        }else{
            console.log(response.errorText);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });   
}


function Modificar(idEditorial){
    window.location = "editorial-modificar.php?id=" + idEditorial;
}

function ModificarRegistro(idEditorial){
    var editorial = $('#editorial').val();

    if(editorial == ""){
        alert("Debe llenar todos los campos");
        return;
    }

    // Guardar
    $.ajax({
        url: '../controlador/editorial/modificar.editorial.php',
        data: { "NombreEditorial" : editorial, "idEditorial" : idEditorial },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos de la editorial se han modificado de forma exitosa");
            window.location = "editorial-consulta.html";
        }else{
            console.log(response.errorText);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });
}