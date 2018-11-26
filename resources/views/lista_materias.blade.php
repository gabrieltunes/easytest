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

          <th id="teste">Código</th>
          <th id="teste">Descrição</th>
          <th ></th>

        </tfoot>
        <tbody>
        	
          @foreach($materias as $materia)
    	      <tr>
    	        <td>{{$materia->id}}</td>
    	        <td>{{$materia->descricao}}</td>
    	        <td>
    	        	<div class="btn-group">
                  <form action="{{action('MateriaController@destroy', $materia['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                    <br><br>
                  </form>

                  <div>
                    <a href="{{action('MateriaController@edit', $materia['id'])}}" class="btn btn-warning btn-sm">Editar</a>
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

/*$(document).ready(function(){
  
      $(document).on('click', '#add', function(e){
          e.preventDefault();
          var i = $('#def').length;    //pega a quantidade de clones;
          var elementos = elm_html.replace(/\[[0\]]\]/g, '['+i+++']');  //substitui o valor dos index e incrementa++

          $(elementos).append('');
          $('#definicoes').append(elementos);  //exibe o clone.
      });
  
	});*/


</script>
@endsection

@endsection