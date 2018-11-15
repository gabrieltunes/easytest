@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Provas geradas:
  	</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Código</th>
	          <th>Data</th>
	          <th>Opção</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th>Código</th>
	          <th>Data</th>
	          <th>Opção</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($provas as $prova)
		      <tr>
		        <td>{{$prova['id']}}</td>
		        <td>{{$prova->created_at->format('d M Y')}}</td>
		        <td>
		          <form action="{{action('ProvaController@destroy', $prova['id'])}}" method="post">
		            @csrf
		            <input name="_method" type="hidden" value="DELETE">
		            <button class="btn btn-danger" type="submit">Excluir</button>
		            <br><br>
		          </form>
		          <form action="{{action('GabaritoController@imprimir', $prova['id'])}}" method="post">
		            @csrf
		            <input name="_method" type="hidden" value="IMPRIMIR">
		            <button class="btn btn-success" type="submit">Gabarito</button>
		          </form>
		        </td>
		      </tr>
		    @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>


@endsection