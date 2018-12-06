$(document).ready(function() {
    //Realiza a criação dos campos de busca e os insere na tabela
    $('#dataTable tfoot #teste').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar por '+title+'" />' );
        $('#dataTable tfoot th').appendTo('#dataTable thead');
    } );
 
    // DataTable
    var table = $('#dataTable').DataTable();
 
    // Realiza a busca
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
} );