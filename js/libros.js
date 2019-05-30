$(document).ready(function(){
    $.ajax({
        url: '../../controlador/libros/consulta.libros.php',
        dataType: 'json'
    }).done(function(response){
        var tabla = "";
        $.each(response, function(index, data){
            tabla += "<tr>";
            tabla += "<td>" + data.Titulo + "</td>";
            tabla += "<td>" + data.nombreEditorial + "</td>";
            tabla += "<td>" + data.Edicion + "</td>";
            tabla += "<td>" + data.Anio_publicacion + "</td>";
            tabla += "<td>" + data.Asunto + "</td>";
            tabla += "<td>" + data.Ejemplares + "</td>";
            tabla += "<td>";
            tabla += "<button class='btn btn-warning' onclick='Modificar(" + data.Id_libros + ");'>Modificar</button>";
            tabla += "<button class='btn btn-danger' onclick='Eliminar(" + data.Id_libros + ");'>Eliminar</button>";
            tabla += "</td>";
            tabla += "</tr>";
        });

        $('#tabla').html(tabla);
    }).fail(function(response){
        console.log(response);
    });

    
});


function guardar(){
    /*Obteniendo los datos del formulario
    y los almacena en variabes*/
    var titulo = $('#Titulo').val();
    var edicion = $('#Edicion').val();
    var publicacion = $('#Anio_publicacion').val();
    var asunto = $('#Asunto').val();
    var ejemplares = $('#Ejemplares').val();
    var editorial = $('#Editorial').val();


    if(!validar()){
        return;
    }

    var data = {
        "Titulo" : titulo, 
        "Edicion" : edicion, 
        "Anio_publicacion" : publicacion, 
        "Asunto" : asunto, 
        "Ejemplares" : ejemplares,
        "Editorial" : editorial
    }

    // Guardar
    $.ajax({
        url: '../../controlador/libros/guardar.libros.php',
        data: data,
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos del libro se han guardado de forma exitosa");
            window.location = "consultar.php";
        }else{
            console.log(response);
        }
    }).fail(function(response){
        console.log(response.responseText);
    });
}


function Eliminar(idEliminar){
    $.ajax({
        url: '../../controlador/libros/eliminar.libros.php',
        data: { "Id_libros" : idEliminar },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos se han eliminado de forma exitosa");
            window.location = "consultar.php";
        }else{
            console.log(response);
        }
    }).fail(function(response){
        console.log(response);
    });   
}


function Modificar(Id_libros){
    window.location = "modificar.php?id=" + Id_libros;
}

function ModificarRegistro(id_libros){
    var titulo = $('#Titulo').val();
    var edicion = $('#Edicion').val();
    var publicacion = $('#Anio_publicacion').val();
    var asunto = $('#Asunto').val();
    var ejemplares = $('#Ejemplares').val();


    if(!validar()){
        return;
    }

    var data = {
        "Titulo" : titulo, 
        "Edicion" : edicion, 
        "Anio_publicacion" : publicacion, 
        "Asunto" : asunto, 
        "Ejemplares" : ejemplares,
        "idLibro" : id_libros
    }

    // Guardar
    $.ajax({
        url: '../../controlador/libros/modificar.libros.php',
        data: data,
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        if(response.Respuesta == "OK"){
            alert("Los datos del libro se han modificado de forma exitosa");
            window.location = "consultar.php";
        }else{
            console.log(response.errorText);
        }
    }).fail(function(response){
        console.log(response.errorText);
    });
}

function limpiar(){
    $('#libros').val("");
}

function validar(){
    
    if($('#Titulo').val() == ""){
        alert("Debe llenar el campo titulo");
        return false;
    }
    if($('#Edicion').val() == ""){
        alert("Debe llenar el campo edicion");
        return false;
    }
    if($('#Anio_publicacion').val() == ""){
        alert("Debe llenar el campo publicacion");
        return false;
    }
    if($('#Asunto').val() == ""){
        alert("Debe llenar el campo asunto");
        return false;
    }
    if($('#Ejemplares').val() == ""){
        alert("Debe llenar el campo ejemplares");
        return false;
    }

    return true;
}