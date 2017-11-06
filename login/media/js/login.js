
$(function(){

  	$('#login_bt').on('click',function(event){

   		event.preventDefault();
   		login($('form'));

  	});

 });

function login(form){

	var count_empty = 0;

    form.find('input').each(function(){
  	    var input = $(this);
  	    if (!validateField(input)){
  	      	count_empty++;
  	    }
    });

   	if (count_empty <= 0) {

   		$('.container h1').addClass('form-success')
                        .fadeOut(300, function(){ $(this).text("Cargando").show() });

  		$('form').fadeOut(500,function() {

      	 	$('.container-sk-cube').show(500);
          callWebService();
   	 	});

   	}

}//Fin function login

function callWebService(){

   var $form = $('form');
   var dataJson = getFormData($form);
   var $login;
   $.wait( function(){  timeAjax(dataJson)  }, 3);

}

function timeAjax(dataJson ){

   var path = window.location.href.split( '/' );
   var baseURL = path[0]+ "//" +path[2]+'/'+path[3];

   $login = $.ajax({
                      type: "POST",
                      url: baseURL + '/controllers/login.php',
                      data: dataJson,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"

   }); $login.done(function(response) {

        console.log(response);

        switch(response.rc) {
          case 200:

              window.location.href = baseURL;
        
              break;
          case -200:
              mensajeResponse();
              title_alerts = "Notificación";
              alertaResponse(title_alerts, icon_danger, alerClassDanger, response.mensaje, directionShowCenter,3000);
              break;
          default:
              alert("sin respuesta");
        }

    });

    $login.fail(function(response) {
      console.log(response); 
      mensajeResponse();
      var title_alerts = "Notificación";
      var mensaje = "No se puede atender su solicitud momento, Consulte con el Departamento de Sistema";
      alertaResponse( title_alerts, icon_danger, alerClassDanger, mensaje, directionShowCenter,3000 );
    });

   /*
    
    $login.always(function(data) {
       console.log(data);
    });

    */

}

function mensajeResponse(){

   $('.container h1').removeClass('form-success')
                     .fadeIn(300, function(){
                                             $(this).text("Iniciar Sesión").show()
                                            });

      $('form').fadeIn(500,function() {

          $('.container-sk-cube').hide(400);

      });
}


$.wait = function( callback, seconds){
   return window.setTimeout( callback, seconds * 100 );
}


function getFormData($form){
    var unindexed_array = $form.serializeArray();

    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

//Función para comprobar los campos de texto
function validateField(input) {

	var _empty 		 = (input.val().length <= 0) ? true : false;
	var _specialChar = /[\s+\W+]/g.test(input.val()) ? true : false;
	var _space 		 = /[\s]/g.test(input.val());
	var valid 		 = true;

	if (input.attr('id') == "user_name" && ( _empty || _specialChar))
	{
		input.addClass('input-error');
		valid = false;
	}
	else if( input.attr('id') == "password" && (_empty || _space) )
	{
		input.addClass('input-error');
		valid = false;
    }else
    {
    	input.removeClass('input-error');
		return valid;
    }

}

function blokSpace(e, campo)
{
    ///key es una variable que recoge el valor ASCII de la tecla pulsada.
    key = e.keyCode ? e.keyCode : e.which
        /// Validamos la tecla backspace
    if (key == 32) return false

}
