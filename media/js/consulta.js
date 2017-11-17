var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){
		
	 consultarData();

	 	$('#table-consulta-cliente').DataTable({

			 	"ajax": baseURL + "/consultar_clientes",
			 	
		        "columns": [
		            { "data": "nombre_cliente" },
		            { "data": "pre_doc_cliente" },
		            { "data": "doc_cliente" },
		            { "data": "tipo_cliente" },
		            { "data": "rason_social_cliente" },
		            { "data": "email_cliente" },
		            { "data": "telf_cliente" },
		            { "data": "otro_telf_cliente" },
        			{"render": function () {
            									return '<button type="button" id="btn-editar" class="btn"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></button>';
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

});


function consultarData(){

	/*var dataJson = { "mes" : "clientes"};

	$login = $.ajax({
                      type: "POST",
                      url: baseURL + "/consultar_clientes",
                      data: dataJson,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json"

    }); 

    $login.done(function(response) {

    });

    $login.fail(function(response) {
        console.error("hubo un inconveniente");
    });*/

    /*$login.always(function(data) {
       console.info("consulta realizada"); 
       console.log(data);
    });*/

}