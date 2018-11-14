@extends('layouts.pric')

@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
      <i class="fas fa-table"></i>
      Cabeçalhos Cadastrados
  	</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      <thead>
	        <tr>
	          <th>Descrição</th>
	          <th>Logo</th>
	          <th>Opções</th>
	        </tr>
	      </thead>
          <tfoot>
            <tr>
              <th>Descrição</th>
	          <th>Logo</th>
	          <th>Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($cabecalhos as $cabecalho)
		      <tr>
		        <td>{{$cabecalho['nome']}}</td>
		        <td><img src="/logo/{{$cabecalho['logo']}}"
					     alt="logo"
					     width="200"
					     height="141"
					     title="Logo do cabeçalho"></td>
		        <td>
		          <form action="{{action('Cabecalho_ProvaController@destroy', $cabecalho['id'])}}" method="post">
		            @csrf
		            <input name="_method" type="hidden" value="DELETE">
		            <button class="btn btn-danger" type="submit">Delete</button>
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