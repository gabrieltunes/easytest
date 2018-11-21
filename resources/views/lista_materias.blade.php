@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Matérias cadastradas:
  	</div>
    <div class="card-body">
    	@if($errors->any())
			<div class="alert alert-danger" role="alert">
			  	@foreach($errors->all() as $error)
				 	{{ $error }}
				@endforeach
			</div>

			@elseif(session()->has('success'))
			<div class="alert alert-success" role="alert">
			  {{ session('success') }}
			</div>
		@endif
      
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Código</th>
	          <th>Descrição</th>
	          <th>Opção</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th>Código</th>
	          <th>Descrição</th>
	          <th>Opção</th>
            </tr>
          </tfoot>
          <tbody>
          	
            @foreach($materias as $materia)
		      <tr>
		        <td>{{$materia->id}}</td>
		        <td>{{$materia->descricao}}</td>
		        <td>
		        	<div class="btn-group">
			          <div>
			          	
			          </div>
			        </div>
		        </td>
		      </tr>

		      
		    @endforeach
		
          </tbody>
        </table>
      </div>
    </div>
</div>

@section('post-script')
<script type="text/javascript">
 /* $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#dataTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar por '+title+'" />' );
        $('#dataTable tfoot th').appendTo('#dataTable thead');
    } );
 
    // DataTable
    var table = $('#dataTable').DataTable();
 
    // Apply the search
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
} );*/


</script>
@endsection

@endsection