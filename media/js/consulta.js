var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){
		
	 consultarData();

	 	$('#table-consulta-cliente').DataTable({

	 			 scrollY: "50vh",
        		 scroller: true,
        		 scrollCollapse: true,
        		 responsive: true,

			 	"ajax": baseURL + "/consultar_clientes",
			 	
		        "columns": [
		            { "data": "nombre" },
		            { "data": "documento" },
		            { "data": "telefono" },
		            { "data": "otro_tefl" },
		            { "data": "email" },
		            { "data": "tipo_cliente" },
		            { "data": "rason_social" },
        			{"render": function () {
        						var btn_edit = '<button type="button" id="btn-editar" class="btn btn-edit"><span class="fa fa-edit"></span></button>';
            					var btn_cancel = '<button type="button" id="btn-cancelar" class="btn btn-cancel"><span class="fa fa-trash-o"></span></button>'; 
            					return '<div class="cont-btn-table">'+btn_edit + btn_cancel+'</div>';
       						   }
       				},
		        ],
		     /*    "sScrollY": "500px",
		         "scrollX": true,
 				 scrollCollapse: true,*/
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