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

 if ( cantidad_rollo == 0 || cantidad_carton == 0 || cantidad_goma == 0 || cantidad_resma == 0 ) {

    alert("No se puede Generar Orden de Produccion falta materia prima");

 }

 var unidades = {"data" : [ {"rollo" : cantidad_rollo }, {"carton": cantidad_carton},{"goma":cantidad_goma}, {"resma":cantidad_resma}]};

 calcularProduccion(tipo_producto,unidades);

});



});

function calcularProduccion(tipo_producto, unidades){

  var cantidad_rollo  = unidades.data[0].rollo;
  var cantidad_carton = unidades.data[1].carton;
  var cantidad_goma   = unidades.data[2].goma;
  var cantidad_resma  = unidades.data[3].resma;

  var unidades_rollo  = 0;
  var unidades_carton = 0;
  var unidades_goma   = 0;
  var unidades_resma  = 0;
 
  if (tipo_producto == "ejecutiva"){

     unidades_rollo  = cantidad_rollo  * 16;
     unidades_carton = cantidad_carton * 9;
     unidades_goma   = cantidad_goma   * 9;
     unidades_resma  = cantidad_resma  * 40;

  }

/*  if (tipo_producto == "gerencial"){

    var unidades_rollo  = cantidad_rollo  * 16;
    var unidades_carton = cantidad_carton * 9;
    var unidades_goma   = cantidad_goma   * 9;
    var unidades_resma  = cantidad_resma  * 40;

  }

  if (tipo_producto == "perpetua"){

    var unidades_rollo  = cantidad_rollo  * 16;
    var unidades_carton = cantidad_carton * 9;
    var unidades_goma   = cantidad_goma   * 9;
    var unidades_resma  = cantidad_resma  * 40;

  }*/

    var arr = [unidades_rollo, unidades_carton, unidades_goma ,unidades_resma];

    var max_agendas = Math.min(...arr);
    
    $("#cantidad_unidades").val(max_agendas);

    var resto_rollo  = parseInt( (max_agendas * cantidad_rollo)  / unidades_rollo );
    var resto_carton = parseInt( (max_agendas * cantidad_carton) / unidades_carton );
    var resto_goma   = parseInt( (max_agendas * cantidad_goma)   / unidades_goma );
    var resto_resma  = parseInt( (max_agendas * cantidad_resma)  / unidades_resma );

    var update_rollo  = Math.abs(cantidad_rollo  - resto_rollo);
    var update_carton = Math.abs(cantidad_carton - resto_carton);
    var update_goma   = Math.abs(cantidad_goma   - resto_goma);
    var update_resma  = Math.abs(cantidad_resma  - resto_resma);

    $("#resto_rollo").val(update_rollo);
    $("#resto_carton").val(update_carton);
    $("#resto_goma").val(update_goma);
    $("#resto_resma").val(update_goma);

    //actualizarMateriales(, carton_resto, goma_resto, resma_resto);

/*  $("#cantidad_unidades").val(max_agendas);*/

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