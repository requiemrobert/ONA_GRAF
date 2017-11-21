var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){

  console.log(baseURL);

    $("#registrar_cliente").on('click', function(event){

        event.preventDefault();
        var $form = $("#registrar-cliente");
        
        var dataJson = getFormData($form);

        var count_empty = 0;

        $form.find('input').each(function(){
          
          if (!validateField($(this))){
                count_empty++;
             }
          
        });

        if(count_empty > 0) {
           
          alert("algun campo esta vacio");
            
        }else if(count_empty == 0){
          
          sendRequest("registrar", dataJson);
          
        }

    }); 


});//end main function


//Función para comprobar los campos de texto
function validateField(input) {

  var _empty       = (input.val().length <= 0) ? true : false;
  var letter       = /[a-zA-Z]+/g.test(input.val()) ? false : true;
  var email        = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/g.test(input.val()) ? false : true;   
  var valid        = true;

  if (input.attr('required') == 'required' && _empty)
  {
    input.addClass('input-error');
    valid = false;
  }
  else if (input.attr('letter') == 'true' && ( _empty || letter) )
  {
    input.addClass('input-error');
    valid = false;
  }
  else if (input.attr('email') == 'true' && ( _empty || email) )
  {
    input.addClass('input-error');
    console.log(input.attr('id') + " ==> empty : " + _empty +" email : |" + email);
    valid = false;
  }
  else
  {
    input.removeClass('input-error');
  }

  return valid;
}

function sendRequest(action, dataJson){

    $login = $.ajax({
                      type: "POST",
                      url: baseURL + action,
                      data: dataJson,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"

    }); $login.done(function(response) {
        console.log(response);
        mensajeResponse(response);
        $('#registrar-cliente')[0].reset();
    });

    $login.fail(function(response) {
      console.error(response); 
    });

    $login.always(function(data) {
       console.log(data);
    });

}

function mensajeResponse(response){

    switch(response.rc) {
          case 200:

              alert(response.mensaje);
        
              break;

          case -200:

              alert(response.mensaje);
              break;
          default:
              alert("sin respuesta");
    }

}

function getFormData($form){
    var unindexed_array = $form.serializeArray();

    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

function changeValueL(dropdown) {
        var option = dropdown.options[dropdown.selectedIndex].value,
            field = document.getElementById('pre_doc_cliente');

        if (option == 'J' || option == 'G' ) {
          field.maxLength = 9;
        } else if (option == 'V' || option == 'E') {
          field.value = field.value.substr(0, 8); // before reducing the maxlength, make sure it contains at most 8 characters; you could also reset the value altogether
          field.maxLength = 8;
        }
}

function number(e) {

    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);

    if(!patron.test(tecla_final)){
      alert("funcion no permitida");
    }

    return patron.test(tecla_final);

}