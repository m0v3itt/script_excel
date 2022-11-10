$(document).ready( function () {
    $('#example').DataTable({
        "ordering": false,
        "lengthMenu": [25, 100],
        language:{
            lengthMenu: "Apresenta _MENU_ praias por página",
            zeroRecords: "Não existem resultados",
            info: "Página _PAGE_ de _PAGES_",
            infoEmpty: "Não existem resultados",
            infoFiltered: "(Filtrado de um total de _MAX_ praias)",
            paginate: {
                first:      "Primeiro",
                last:       "Ultimo",
                next:       "Próximo",
                previous:   "Anterior"
            }
        }
    });
} );
