var path = window.location.href.split( '/' );
var baseURL = path[0]+ "//" +path[2]+'/'+path[3] + '/' + path[4] + '/';

$(function(){

  fetch_data();
 
});

function fetch_data()
{

 var table = $('#table-consulta-stock_mp').DataTable({

         scrollY: "51vh",
         scroller: true,
         scrollCollapse: true,
         responsive: true,
         "ajax": baseURL + "consultar_Stock_MP",
        
          "columns": [
                { "data": "id_stock" },
                { "data": "tipo_material" },
                { "data": "cantidad_material" },
                { "data": "unidades" },
                { "data": "precio" },
                { "data": "fecha_registro" },
                { "data": "descripcion" },
             
          ],
          /*** configure PDF ***/
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'print'
          ],
          "language": {
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "zeroRecords": "No se encontraron resultados",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Último",
                      "sNext": "Siguiente",
                      "sPrevious": "Anterior"
                  }
          },

          "initComplete": function (settings, json) {
              this.api().column(1).every(function () {

                  var column = this;

                  var sum = column
                     .data()
                     .reduce(function (a, b) { 
                         a = parseInt(a, 10);
                         if(isNaN(a)){ a = 0; }
                         
                         b = parseInt(b, 10);
                         if(isNaN(b)){ b = 0; }
                         
                         return a + b;
                     });

                  $(column.footer()).html('Total: ' + sum);


              });
          },
          "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over this page
            total = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                console.log(total);
 
            // Update footer
            $( api.column( 1 ).footer() ).html( "Total :"+ total );
        }
    }); 

}//END FETCH DATA


