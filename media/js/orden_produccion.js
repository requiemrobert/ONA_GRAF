var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){

consultarDisponible();

$('.js-example-basic-single').select2();

$('#tipo_producto').on("select2:select", function (e) { 
         
    var tipo_producto = $(e.currentTarget).val();

}); 

$("#calcular_unidades").on("click",function(){

 var cantidad_rollo  = parseInt($("#rollo_disponible").val());
 var cantidad_carton = parseInt($("#carton_disponible").val());
 var cantidad_goma   = parseInt($("#goma_disponible").val());
 var cantidad_resma  = parseInt($("#resma_disponible").val());

 var tipo_producto = $("#tipo_producto").val();

/* if ( rollo == 0 || carton == 0 || goma == 0 || resma == 0 ) {

    alert("No se puede Generar Orden de Produccion falta materia prima");

 }*/

 var unidades = {"data" : [ {"rollo" : cantidad_rollo }, {"carton": cantidad_carton},{"goma":cantidad_goma}, {"resma":cantidad_resma}]};

 calcularProduccion(tipo_producto,unidades);

});



});

function calcularProduccion(tipo_producto, unidades){

  var rollo  = unidades.data[0].rollo;
  var carton = unidades.data[1].carton;
  var goma   = unidades.data[2].goma;
  var resma  = unidades.data[3].resma;

  if (tipo_producto == "ejecutiva") {}


}


function consultarDisponible(){

    $login = $.ajax({
                      type: "GET",
                      url: baseURL + 'consultar_disponible_MP',
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"

    }); 

    $login.done(function(response) {

        var data = response.data;

        for (var i in data) {

            //console.log(data[i].tipo_material);

            switch (data[i].tipo_material.replace(/~+$/g,'')) { 
              case 'rollo': 
                
                $("#rollo_disponible").val(data[i].cantidad_disponible);
        
                break;

              case 'carton':

                $("#carton_disponible").val(data[i].cantidad_disponible);

                break;

              case 'goma': 

                $("#goma_disponible").val(data[i].cantidad_disponible);
               
                break;    
              case 'resma': 

                $("#resma_disponible").val(data[i].cantidad_disponible);

                break;

              default:

            }
        }//End for

    });

    $login.fail(function(response) {
        console.error(response); 
    });

    $login.always(function(data) {
        
    });

}

function number(e, v) {

    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);

    if(!patron.test(tecla_final)){
      alert("Ingresa únicamente números");
    }

    return patron.test(tecla_final);

}