var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){
		
	fetch_data();	

	var modal = $('#data-update');

	// When the user clicks on the button, open the modal 
	$(".btn").on('click', function() {
	  	// Get the modal
	    modal.css("display" , "block");

	});

	// When the user clicks on <span> (x), close the modal
	$(".close").on('click', function() {
	    modal.css("display" , "none");
      $('#data-delete').css("display" , "none");
	});

  $( '#tipo_material' ).on('change', function(){

    var tipo = $(this).val();
    
    renderUnidades(tipo);
    
  });

	$('#table-consulta-stock-mp tbody').on( 'click', '.update', function () {

     

		  modal.css("display" , "block");
   		var row = $(this).parent().parent().parent();
    	var table = $('#table-consulta-stock-mp').DataTable();
    	var field = table.row( row ).data();

       renderUnidades(field.tipo_material);

      $("#id_stock").val(field.id_stock);
      $("#tipo_material").val(field.tipo_material);
      $("#cantidad_material").val(field.cantidad_material);
      $("#unidades").val(field.unidades);
      $("#precio").val(field.precio);
      $("#fecha_registro").val(field.fecha_registro);
      $("#descripcion").val(field.descripcion);

	});	 

  $("#guardar-cambios").on('click', function(){

      validateForm();

  }); 

  $('#table-consulta-stock-mp tbody').on( 'click', '.delete-stock', function () {

      $('#data-delete').css("display","block");

      var row = $(this).parent().parent().parent();
      var table = $('#table-consulta-stock-mp').DataTable();
      var field = table.row( row ).data(); 

      $("#id_stock_delete").val(field.id_stock);

      $("#info-stock").text("( id_stock :"+field.id_stock+", tipo :"+field.tipo_material+", cantidad "+field.cantidad_material+", fecha registro :"+field.fecha_registro+" )");
   
  });

  $("#delete-stock").on('click', function(){

      eliminarData($("#id_stock_delete").val());

  }); 


});

function modificarData(dataJson){
  
    $login = $.ajax({
                      type: "POST",
                      url: baseURL + "/modificar_Stock_MP",
                      data: dataJson,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"
    }); 

    $login.done(function(response) {
  
      mensajeResponse(response)
  
    });

    $login.fail(function(response) {
        console.error("hubo un inconveniente");
    });

    $login.always(function(data) {
       console.info("accion completada"); 
       console.log(data);
    });

}

function eliminarData(data){

    var dataJson = JSON.stringify({"id_stock" : data});

    $login = $.ajax({
                      type: "POST",
                      url: baseURL + "/eliminar_Stock_MP",
                      data: dataJson,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"
    }); 

    $login.done(function(response) {
  
      mensajeResponse(response);
  
    });

    $login.fail(function(response) {
        console.error("hubo un inconveniente");
    });

    $login.always(function(data) {
       //console.info("accion completada"); 
       //console.log(data);
    });

}

function validateForm(){ 
    
    var $form = $("#registrar-stock_mp");
        
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
          
          modificarData(dataJson);
          
        }
}   

function renderUnidades(tipo){

    var cantidad = $('#cantidad_material');

    cantidad.empty()
          .append('<option selected="selected" value="">Seleccione</option>');

    switch (tipo) { 
      case 'rollo': 
        cantidad.append('<option value="100" selected="selected">100 Mts</option>');
        cantidad.append('<option value="70">70 Mts</option>');
        cantidad.append('<option value="50">50 Mts</option>');
        break;
      case 'carton': 
        cantidad.append('<option value="100" selected="selected">100cm X 70 cm </option>');
        break;
      case 'goma': 
        cantidad.append('<option value="100" selected="selected">100cm X 70 cm </option>');
        break;    
      case 'resma': 
        cantidad.append('<option value="100" selected="selected">66cm X 96 cm</option>');
        break;
      default:
        cantidad.empty();
    }
}  

function mensajeResponse(response){

    switch(response.rc) {
          case 200:

              alert(response.mensaje);
              $('#table-consulta-stock-mp').DataTable().destroy();
     		      fetch_data();	
        	    $('#data-update').css("display" , "none");
              $('#data-delete').css("display" , "none");
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

function fetch_data()
{
	$('#table-consulta-stock-mp').DataTable({

	 			 scrollY: "51vh",
         scroller: true,
         scrollCollapse: true,
         responsive: true,
         "processing" : true,
    		 /* "serverSide" : true,*/
			 	 "ajax": baseURL + "/consultar_Stock_MP",
			 	
		         "columns": [
                { "data": "id_stock" },
		            { "data": "tipo_material" },
		            { "data": "cantidad_material" },
		            { "data": "unidades" },
		            { "data": "precio" },
		            { "data": "fecha_registro" },
		            { "data": "descripcion" },
        			  { "render": function () {
        						  var btn_edit = '<button type="button" id="btn-editar" class="btn btn-edit update"><span class="fa fa-edit"></span></button>';
            					var btn_cancel = '<button type="button" id="btn-delete" class="btn btn-cancel delete-stock"><span class="fa fa-trash-o"></span></button>'; 
            					return '<div class="cont-btn-table">'+btn_edit + btn_cancel+'</div>';
       						   }
       				},
		        ],
		        "language": {
	            "lengthMenu": "Mostrar _MENU_ registro por página",
	            "zeroRecords": "No se encontraron resultados",
	            "info": "Mostrando del _PAGE_ de _PAGES_",
	            "infoEmpty": "Ningún dato disponible en esta tabla",
	            "infoFiltered": "(filtrado desde _MAX_ total records)",
	           	"sSearch": "Buscar:",
			    	"sUrl": "",
			    	"sInfoThousands": ",",
			    	"sLoadingRecords": "Por favor espere - cargando...",
			   		"oPaginate": {
			        			   "sFirst":    "Primero",
			        			   "sLast":     "Último",
			        			   "sNext":     "Siguiente",
			        			   "sPrevious": "Anterior"
			   		  }
	          }
	 
	 	}); 

}//END FETCH DATA


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

