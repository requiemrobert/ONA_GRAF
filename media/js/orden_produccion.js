var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){

consultarDisponible();

var modal = $('#data-generar-orden');

$("#pre_generar_orden").on('click',function(){

    modal.css("display" , "block");
});

// When the user clicks on <span> (x), close the modal
$(".close").on('click', function() {
    modal.css("display" , "none");
    $('#data-delete').css("display" , "none");
});

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

 }else if( tipo_producto == ''){

    alert("Seleccione un tipo de Producto");

 }else{

   var unidades = {"data" : [ {"rollo" : cantidad_rollo }, {"carton": cantidad_carton},{"goma":cantidad_goma}, {"resma":cantidad_resma}]};

   calcularProduccion(tipo_producto,unidades);
   $("#pre_generar_orden").addClass("btn-action");
   $("#pre_generar_orden").attr("disabled",false);

 }

});

$("#generar").on('click', function(){

    var update_rollo  = $("#resto_rollo").val();
    var update_carton = $("#resto_carton").val();
    var update_goma   = $("#resto_goma").val();
    var update_resma  = $("#resto_resma").val();
    var producto      = $("#tipo_producto").val();
    var cantidad_producto = $("#cantidad_unidades").val();

    actualizarMateriales(update_rollo, update_carton, update_goma, update_resma, producto, cantidad_producto);

});
  

});/***** END MAIN *****/

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

  if (tipo_producto == "gerencial"){

     unidades_rollo  = cantidad_rollo  * 9;
     unidades_carton = cantidad_carton * 4;
     unidades_goma   = cantidad_goma   * 4;
     unidades_resma  = cantidad_resma  * 58;

  }

  if (tipo_producto == "perpetua"){

     unidades_rollo  = cantidad_rollo  * 16;
     unidades_carton = cantidad_carton * 9;
     unidades_goma   = cantidad_goma   * 9;
     unidades_resma  = cantidad_resma  * 110;

  }

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
    $("#resto_resma").val(update_resma);

}

function actualizarMateriales(update_rollo, update_carton, update_goma, update_resma, producto, cantidad_producto){

    $login = $.ajax({
                      type: "POST",
                      data: JSON.stringify({  
                                            producto :producto, 
                                            cantidad_producto : cantidad_producto,
                                            cantidad_rollo : update_rollo, 
                                            cantidad_carton : update_carton,
                                            cantidad_goma : update_goma, 
                                            cantidad_resma :update_resma }),
                      url: baseURL + 'actualizar_MP',
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"
    }); 

    $login.done(function(response) {

        var data = response.data;

    });

    $login.fail(function(response) {
        console.error(response); 
    });

    $login.always(function(data) {
        
    });

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

function mensajeResponse(response){

    switch(response.rc) {
          case 200:

              alert("Orden de Produccion Resgitrada exitosamente");
              window.location.reload(true);
              $("#tipo_producto").empty().append('<option selected="selected" value="">Seleccione</option>');

              break;

          case -200:

              alert(response.mensaje);
              break;
          default:
              alert("sin respuesta");
    }

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