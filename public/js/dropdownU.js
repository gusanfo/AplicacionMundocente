$(document).ready(function() {
    $("#ciudad").change(function(event) {
      //  alert("Ejemplo de alerta con JavaScript");
       $.get("/universidades/"+ event.target.value+"",function(response,ciudad) {
         $("#universidad").empty();

            for (i=0; i < response.length; i++ ) {
                 $("#universidad").append("<option value='"+response[i].nombre+"' >"+response[i].nombre+"</option>");
            }
        });
    });
});
