$(document).ready(function() {
    $("#departamento").change(function(event) {
        //alert("Estoy dentro de la funcion");
       $.get("/ciudades/"+ event.target.value+"",function(response,departamento) {
         $("#ciudad").empty();
            for (i=0; i < response.length; i++ ) {
                 $("#ciudad").append("<option value='"+response[i].id+"' selected='selected'>"+response[i].nombre+"</option>");
            }
        });
    });
});
